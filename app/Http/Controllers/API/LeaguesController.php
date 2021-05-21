<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LeagueResource;
use App\Repositories\Interfaces\LeagueInterface;
use Illuminate\Http\Request;

class LeaguesController extends Controller
{
    /**
     * @var LeagueInterface
     */
    private $league;

    public function __construct(LeagueInterface $league)
    {
        $this->league = $league;
    }

    public function index(Request $request)
    {
        $league = $this->league->all(['team']);

        return response()->json([
            'league' => LeagueResource::collection($league)
        ]);
    }
}
