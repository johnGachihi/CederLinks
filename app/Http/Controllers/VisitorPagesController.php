<?php

namespace App\Http\Controllers;

use App\Mission;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitorPagesController extends Controller
{
    public function index()
    {
        $missions = Mission::where("status", "published")
            ->where("date", ">=", Carbon::now())
            ->orderBy("date", "asc")
            ->take(10)
            ->get();

        return view("visitors.index")
            ->with("missions", $missions);
    }
}
