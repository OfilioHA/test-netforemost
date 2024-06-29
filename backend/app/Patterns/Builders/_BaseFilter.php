<?php

namespace App\Patterns\Builders;

use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class _BaseFilter
{
    protected Builder $query;
    protected array $params;

    public function __construct(Builder $query, array $params)
    {
        $this->setQuery($query);
        $this->setParams($params);
    }

    public function setQuery(Builder $query)
    {
        $this->query = $query;
    }

    public function setParams(array $params)
    {
        $this->params = $params;
    }
}

interface  _IBaseFilter
{
    public function build(): Builder;
}
