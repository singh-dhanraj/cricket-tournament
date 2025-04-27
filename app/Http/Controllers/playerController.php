<?php

namespace App\Http\Controllers;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Player;

class playerController extends Controller
{
    public function index(Request $request)
    {
        $teamId = $request->team_id;
        $team = Team::findOrFail($teamId);
        $players = Player::where('team_id', $teamId)->get();
        return view('playerlist', ['players' => $players, 'team' => $team]);
    }



    public function saveplayer(Request $request)
    {
        // dd($request->all());
        $playerId = $request->team_id;
        $playerName = $request->player_name;
        $playerLogo = $request->file('player_logo');
        $playerRole = $request->player_role;

        $imageName = null;

        if ($playerLogo) {
            $image = $request->player_logo;
            $fileName = $playerLogo->getClientOriginalName();
            $newFileNamen = time() . '.' . $fileName;
            $folderPath = public_path('uploads/player_logo');

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            if ($image->move($folderPath, $newFileNamen)) {
                $imageName = $newFileNamen;
            }
        }

        $create = Player::create([
            'team_id' => $playerId,
            'player_name' => $playerName,
            'player_logo' => $imageName,
            'Player_role' => $playerRole,
        ]);

        if ($create) {
            return back();
        } else {
            echo 'something went wrong';
        }

    }

    public function update(Request $request)
    {
        // dd($request->all());
        $student = Player::find($request->player_id);
        // dd($student);
        $playerLogo = $request->file('player_logo');
        $imageName = $student->player_logo;

        if ($playerLogo) {
            $oldPath = public_path('uploads/player_logo/' . $student->player_logo);
            $oldimage = file_exists($oldPath);

            if ($oldimage) {
                unlink($oldPath);
            }

            $image = $request->player_logo;
            $fileName = $playerLogo->getClientOriginalName();
            $newFileNamen = time() . '.' . $fileName;
            $folderPath = public_path('uploads/player_logo');

            if ($image->move($folderPath, $newFileNamen)) {
                $imageName = $newFileNamen;
            }
        }

        // dd($student);
        $student->update([
            'player_name' => $request->player_name,
            'Player_role' => $request->player_role,
            'player_logo' => $imageName

        ]);

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $student = Player::find($request->player_id);

        $student->delete();

        return redirect()->back();
    }

}
;
