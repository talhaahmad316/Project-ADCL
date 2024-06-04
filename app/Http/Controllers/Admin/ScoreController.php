<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matches;
use App\Models\Player;
use App\Models\Score;
use App\Models\BowllingScorecard;

class ScoreController extends Controller
{
    public function create($id)
    {
        $match = Matches::findOrFail($id);

        // Fetch players for the home team
        $homeTeamPlayers = Player::whereHas('teams', function ($query) use ($match) {
            $query->where('name', $match->home_team);
        })->get();

        // Fetch players for the away team
        $awayTeamPlayers = Player::whereHas('teams', function ($query) use ($match) {
            $query->where('name', $match->away_team);
        })->get();
        return view('admin.scorecard.addscore', compact('match', 'homeTeamPlayers', 'awayTeamPlayers'));
    }
    public function store(Request $request, $matchId)
    {
        // Validate the request data if needed

        foreach ($request->input('scores') as $scoreData) {
            Score::create([
                'player_id' => $scoreData['player_id'],
                'match_id' => $request->input('match_id'),
                'runs' => $scoreData['runs'],
                'balls_faced' => $scoreData['balls_faced'],
                'fours' => $scoreData['fours'],
                'sixes' => $scoreData['sixes'],
                'how_they_got_out' => $scoreData['how_they_got_out'],
            ]);
        }

        return redirect()->back()->with('success', 'Scorecard saved successfully');
    }

    public function display($id)
    {
        $match = Matches::findOrFail($id);

        $homeTeamScores = Score::whereHas('player.teams', function ($query) use ($match) {
            $query->where('name', $match->home_team);
        })->where('match_id', $id)->get();
        $awayTeamScores = Score::whereHas('player.teams', function ($query) use ($match) {
            $query->where('name', $match->away_team);
        })->where('match_id', $id)->get();
        

        $homeTeamBowlling = BowllingScorecard::whereHas('player.teams', function ($query) use ($match) {
            $query->where('name', $match->home_team);
        })->where('match_id', $id)->get();
        $awayTeamBowlling = BowllingScorecard::whereHas('player.teams', function ($query) use ($match) {
            $query->where('name', $match->away_team);
        })->where('match_id', $id)->get();
        // dd($homeTeamScores);
        return view('admin.scorecard.scorecardDisplay', compact('match', 'homeTeamScores', 'awayTeamScores','homeTeamBowlling','awayTeamBowlling'));
    }
    public function ballCreate($id)
    {
        $match = Matches::findOrFail($id);

        // Fetch players for the home team
        $homeTeamPlayers = Player::whereHas('teams', function ($query) use ($match) {
            $query->where('name', $match->home_team);
        })->get();

        // Fetch players for the away team
        $awayTeamPlayers = Player::whereHas('teams', function ($query) use ($match) {
            $query->where('name', $match->away_team);
        })->get();
        return view('admin.scorecard.bowllingScorecard', compact('match', 'homeTeamPlayers', 'awayTeamPlayers'));
    }
    public function ballStore(Request $request, $matchId)
    {
        $ballScores = $request->input('ball', []);

        foreach ($ballScores as $scoreData) {
    
            BowllingScorecard::create([
                'player_id' => $scoreData['player_id'],
                'match_id' => $request->input('match_id'),
                'overs' => $scoreData['overs'],
                'runs' => $scoreData['runs'],
                'wickets' => $scoreData['wickets']
            ]);
        }
        return redirect()->back()->with('success', 'Scorecard saved successfully');
    }

}

