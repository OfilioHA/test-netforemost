<?php

namespace App\Services;

use App\Patterns\Builders\AccomodationFilterBuilder;
use App\Repositories\AccommodationRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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

    public function calculateZoneAverage($userCoordinates)
    {
        if (!$userCoordinates) return null;
        $amount = $this->query->count();
        if (!$amount) return null;
        $accommodations = $this->query->get();
        $total = $accommodations->reduce(
            fn ($carry, $item) =>
            $carry + $item->meter_price,
            0
        );
        return (float) $total / $amount;
    }
}
