<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class CricketTournament extends Controller
{
    public function index()
    {
        $team = Team::all();
        return view('cricket', ['teams' => $team]);
    }

    public function saveTeam(Request $request)
    {
        // dd($request->file('team_logo'));
        $teamName = $request->team_name;
        $teamLogo = $request->file('team_logo');

        $imageName = null;

        if ($teamLogo) {
            $image = $request->team_logo;
            $fileName = $teamLogo->getClientOriginalName();
            $newFileNamen = time() . '.' . $fileName;
            $folderPath = public_path('uploads/team-logo');

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            if ($image->move($folderPath, $newFileNamen)) {
                $imageName = $newFileNamen;
            }
        }

        $create = Team::create([
            'name' => $teamName,
            'logo' => $imageName,
        ]);

        if ($create) {
            return redirect()->route('cricket');
        } else {
            echo 'something went wrong';
        }
    }

    public function update(Request $request)
    {

        $edits = Team::find($request->team_id);

        $edits->update([

            'name' => $request->name,

        ]);
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $team = Team::find($request->team_id);

        $team->delete();

        return redirect()->back();
    }


}
;
