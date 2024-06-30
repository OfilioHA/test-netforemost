<?php

namespace App\Services;

use App\Patterns\Builders\AccomodationFilterBuilder;
use App\Patterns\Strategies\AccomodationExportContext;
use App\Repositories\AccommodationRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccommodationService
{
    public AccommodationRepository $repository;
    protected Builder $query;
    const PER_PAGE = 3;

    public function __construct()
    {
        $this->repository  = new AccommodationRepository();
    }

    public function createList(Request $request)
    {
        $params = $request->all();
        $query = $this->repository->getList();
        $filter = new AccomodationFilterBuilder($query, $params);
        $query = $filter->build();
        $this->query = $query;
        return $query;
    }

    public function paginate()
    {
        return $this->query->paginate(self::PER_PAGE);
    }

    public function calculateZoneAverage($useCoordinates)
    {
        $useCoordinates = filter_var($useCoordinates, FILTER_VALIDATE_BOOLEAN);
        if (!$useCoordinates) return null;
        $amount = $this->query->count();
        if (!$amount) return null;
        $accommodations = $this->query->get();
        $total = $accommodations->reduce(
            fn ($carry, $item) =>
            $carry + $item->meter_price,
            0
        );
        $average = (float) $total / $amount;
        return (float) number_format($average, 2, '.', '');
    }

    public function generateReport($type)
    {
        $context = new AccomodationExportContext();
        $context->useStrategy($type);
        return $context->execute(['query' => $this->query]);
    }

    public function storageReport($content, $type)
    {
        $currentDateTime = Carbon::now()->format('Ymd_His');
        $fileName = "accommodations_{$currentDateTime}.$type";
        $filePath = "storage/{$fileName}";
        Storage::put($filePath, $content);
        return [
            'fileName' => $fileName,
            'filePath' => $filePath
        ];
    }
}
