<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MatchResource;
use App\Repositories\Interfaces\MatchInterface;
use App\Repositories\Interfaces\WeekInterface;
use App\Services\LeagueService;
use App\Services\MatchmakingService;
use App\Traits\Matches;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MatchesController extends Controller
{
    use Matches;

    /**
     * @var MatchInterface
     */
    private $match;
    /**
     * @var WeekInterface
     */
    private $week;

    public function __construct(MatchInterface $match, WeekInterface $week)
    {
        $this->match = $match;
        $this->week = $week;
    }

    public function index($week)
    {
        $matches = $this->match->allByWeek($week, ['firstTeam', 'secondTeam']);

        return response()->json([
            'matches' => MatchResource::collection($matches),
        ]);
    }

    public function play(MatchmakingService $matchmakingService, LeagueService $leagueService)
    {
        try {
            $week = $this->week->getUpcomingWeek();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'League weeks are over!'], 400);
        }

        $this->playMatches($week, $matchmakingService, $leagueService);

        return response()->json(['week' => $week]);
    }

    public function playAll(MatchmakingService $matchmakingService, LeagueService $leagueService)
    {
        $weeks = $this->week->getUpcomingWeeks();

        $results = [];
        foreach ($weeks as $week) {
            $results[$week->number] = $this->playMatches($week, $matchmakingService, $leagueService);
        }

        return response()->json([
            'week' => $this->week->getCurrentWeek(),
            'matches' => $results,
        ]);
    }
}
