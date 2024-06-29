<?php

namespace App\Repositories;

use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Builder;

class AccommodationRepository
{
    public function getList()
    {
        $query = Accommodation::query();
        $query->select(
            'original_id',
            'price',
            'title',
            'meter_price',
            'advertiser',
            'register_at'
        );
        $query->join('accommodation_details as dls', 'dls.accommodation_id', '=', 'accommodations.id');
        $query->join('accommodation_locations as lcs', 'lcs.accommodation_id', '=', 'accommodations.id');
        return $query;
    }
}
