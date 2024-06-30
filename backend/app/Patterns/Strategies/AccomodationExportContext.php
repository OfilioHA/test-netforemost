<?php

namespace App\Patterns\Strategies;

use App\Patterns\Singleton\PDFGenerator;

class AccomodationExportContext extends _BaseStrategy
{
    protected $strategies = [
        'csv' => ExportCsvStrategy::class,
        'pdf' => ExportPdfStrategy::class
    ];

    public function useStrategy(string $strategy): void
    {
        $strategy = $this->strategies[$strategy];
        $strategy = new $strategy;
        $this->setStrategy($strategy);
    }

    public function execute(mixed $data)
    {
        $query = $data['query'];
        return $this->strategy->doAlgorithm($query);
    }
}

class ExportPdfStrategy implements IStrategy
{
    public function doAlgorithm($data)
    {
        $pdfGenerator = PDFGenerator::getInstance();
        $html = view('accommodations/report', [
            'data' => $data->get()
        ])->render();
        return $pdfGenerator->create($html);
    }
}

class ExportCsvStrategy implements IStrategy
{

    public function doAlgorithm($data)
    {
        $csvContent = '';
        $accommodatios = $data->get();
        $accommodatios->each(function ($row) use (&$csvContent) {
            $csvContent .= implode(',', $row->getAttributes()) . "\n";
        });
        return $csvContent;
    }
}
