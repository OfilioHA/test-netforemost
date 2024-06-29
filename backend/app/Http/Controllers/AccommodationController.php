<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{

    const PER_PAGE = 5;

    public function index()
    {
        $paginated = Accommodation::query()->paginate(self::PER_PAGE);
        return response()->json($paginated);
    }
}
