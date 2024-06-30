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
        $average = $service->calculateZoneAverage($request->input('use_coordinates'));
        $paginated = $service->paginate();
        return response()->json([
            'pagination' => $paginated,
            'average' => $average
        ]);
    }

    public function report(Request $request)
    {
        $request->validate([
            'report' => ['required']
        ]);
        $reportType = $request->input('report');
        $service = new AccommodationService();
        $service->createList($request);
        $report = $service->generateReport($reportType);
        $fileInfo = $service->storageReport($report, $reportType);
        return response()->json([
            'path' => "storage/app/$fileInfo[filePath]"
        ]);
    }
}
