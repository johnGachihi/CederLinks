<?php

namespace App\Http\Controllers;

use App\Mission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function create()
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
        if ($request->hasFile('image')) {
            $mission->image = $this->storeImage(
                $request->file('image'), $id);
        }
        if ($request->filled('date')) {
            $mission->date = new Carbon($request->date);
        }
        $mission->description = $request->description;
        $mission->save();

        return response()->json(['status' => 'ok']);
    }

    private function storeImage(UploadedFile $image, $missionId): string {
        return $image->storeAs(
            'missions',
            $missionId . '.' . $image->getClientOriginalExtension(),
            'image-uploads');
    }
}
