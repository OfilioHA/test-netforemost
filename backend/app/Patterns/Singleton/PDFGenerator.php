<?php

namespace App\Patterns\Singleton;

use Dompdf\Dompdf;
use Dompdf\Options;

class PDFGenerator extends _BaseSingleton
{
    public function create($html): mixed
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->output();
    }
}
