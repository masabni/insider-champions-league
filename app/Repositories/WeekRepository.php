<?php


namespace App\Repositories;


use App\Models\League;
use App\Models\Match;
use App\Models\Week;
use App\Repositories\Interfaces\LeagueInterface;
use App\Repositories\Interfaces\MatchInterface;
use App\Repositories\Interfaces\WeekInterface;

class WeekRepository implements WeekInterface
{
    /**
     * @var Week
     */
    private $week;

    public function __construct(Week $week)
    {
        $this->week = $week;
    }

    public function setPlayed(int $week, array $with = [])
    {
        return $this->week
            ->where('id', $week)
            ->setPlayed();
    }
}
