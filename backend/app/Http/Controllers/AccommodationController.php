<?php

namespace App\Http\Controllers;

use App\Services\AccommodationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccommodationController extends Controller
{
    public function index(Request $request)
    {
        $service = new AccommodationService();
        $service->createList($request);
        $total = $service->calculateZoneAverage($request->input('use_coordinates'));
        $paginated = $service->paginate();
        return response()->json($paginated);
    }
}
