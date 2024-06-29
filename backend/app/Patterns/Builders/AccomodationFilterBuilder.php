<?php

namespace App\Patterns\Builders;

use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AccomodationFilterBuilder extends _BaseFilter implements _IBaseFilter
{
    public function build(): Builder
    {
        $this->byBedRooms();
        $this->byMinimun();
        $this->byMaximun();
        return $this->query;
    }


    public function byBedRooms()
    {
        if (!isset($this->params['bedrooms'])) return;
        $bedrooms = (int) $this->params['bedrooms'];
        if (!$bedrooms && $bedrooms != 0) return;
        $this->query->where('bedrooms', '=', $bedrooms);
    }

    public function byMinimun()
    {
        if (!isset($this->params['minimum'])) return;
        $minimun = (int) $this->params['minimum'];
        if (!$minimun) return;
        $this->query->where('price', '>=', $minimun);
    }

    public function byMaximun()
    {
        if (!isset($this->params['maximun'])) return;
        $maximun = (int) $this->params['maximun'];
        if (!$maximun) return;
        $this->query->where('price', '<=', $maximun);
    }
}
