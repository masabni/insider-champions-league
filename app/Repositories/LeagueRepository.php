<?php


namespace App\Repositories;


use App\Models\League;
use App\Repositories\Interfaces\LeagueInterface;

class LeagueRepository implements LeagueInterface
{
    /**
     * @var League
     */
    private $league;

    public function __construct(League $league)
    {
        $this->league = $league;
    }

    public function all(array $with = [])
    {
        return $this->league
            ->when($with, function ($q) use ($with) {
                $q->with($with);
            })
            ->orderBy('points', 'desc')
            ->get();
    }

    public function updateMatchLeaderboard(array $result)
    {
        // TODO: Implement updateMatchLeaderboard() method.
    }
}
