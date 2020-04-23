<?php

namespace App\Http\Controllers;

use App\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function create(Request $request)
    {
        $mission = new Mission();
        $mission->save();

        return $mission;
    }

    public function read($id = null) {
        if ($id)
            return Mission::find($id);
        else
            return Mission::all();
    }

    public function update(Request $request, $id) {
        $mission = Mission::find($id);
        $mission->title = $request->title;
//        $mission->image
        $mission->date = $request->date;
        $mission->description = $request->description;
        $mission->save();

        return response()->json(['status' => 'ok']);
    }
}
