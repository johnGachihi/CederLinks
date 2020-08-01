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

    public function single_mission($id)
    {
        $newest_missions = Mission::orderBy("date", "desc")
            ->take(3)
            ->get()
            ->filter(fn($m) => $m->id != $id);

        $approaching_missions = Mission::whereDate("date", ">", Carbon::now())
            ->orderBy("date")
            ->get()
            ->filter(fn($m) => $m->id != $id)
            ->take(3);

        return view("visitors.single-mission")
            ->with("mission", Mission::findOrFail($id))
            ->with("newest_missions", $newest_missions)
            ->with("approaching_missions", $approaching_missions);
    }

    public function upcoming_events() {
        $missions = Mission::where("status", "published")
            ->where("date", ">=", Carbon::now())
            ->orderBy("date")
            ->paginate();

        return view('visitors.upcoming-events')
            ->with("missions", $missions);
    }

    public function past_events()
    {
        $missions = Mission::where("status", "published")
            ->where("date", "<", Carbon::now())
            ->orderBy("date")
            ->paginate();

        return view('visitors.past-events')
            ->with('missions', $missions);
    }
}
