<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Patterns\Builders\AccomodationFilterBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccommodationController extends Controller
{

    const PER_PAGE = 3;

    public function index(Request $request)
    {
        $query = Accommodation::query();
        $query->join('accommodation_details as dls', 'dls.accommodation_id', '=', 'accommodations.id');
        $query->join('accommodation_locations as lcs', 'lcs.accommodation_id', '=', 'accommodations.id');
        $params = $request->all();
        $filter = new AccomodationFilterBuilder($query, $params);
        $query = $filter->build();
        $paginated = $query->paginate(self::PER_PAGE);
        return response()->json($paginated);
    }
}
