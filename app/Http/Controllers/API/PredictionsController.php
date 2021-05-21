<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\LeagueInterface;
use App\Services\PredictionsService;
use Illuminate\Http\Request;

class PredictionsController extends Controller
{
    /**
     * @var LeagueInterface
     */
    private $league;

    public function __construct(LeagueInterface $league)
    {
        $this->league = $league;
    }

    public function __invoke(PredictionsService $service, $week)
    {
        $league = $this->league->all(['team']);

        return $service->predict($league);
    }
}
