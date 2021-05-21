<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MatchResource;
use App\Repositories\Interfaces\LeagueInterface;
use App\Repositories\Interfaces\MatchInterface;
use App\Repositories\Interfaces\WeekInterface;
use App\Services\MatchmakingService;
use Illuminate\Http\Request;

class MatchesController extends Controller
{
    /**
     * @var MatchInterface
     */
    private $match;
    /**
     * @var LeagueInterface
     */
    private $league;
    /**
     * @var WeekInterface
     */
    private $week;

    public function __construct(MatchInterface $match, LeagueInterface $league, WeekInterface $week)
    {
        $this->match = $match;
        $this->league = $league;
        $this->week = $week;
    }

    public function index($week)
    {
        $matches = $this->match->allByWeek($week);

        return response()->json([
            'matches' => MatchResource::collection($matches),
        ]);
    }

    public function play(MatchmakingService $service, $week = null)
    {
        $matches = $service->getScheduledMatches($week);

        foreach ($matches as $match) {
            $result = $service->play($match);
            $this->match->create($result);
            $this->league->updateMatchLeaderboard($result);
        }

        $this->week->setPlayed($week);

        return response()->json([
            'matches' => MatchResource::collection($matches),
        ], 201);
    }
}
