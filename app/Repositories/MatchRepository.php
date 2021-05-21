<?php


namespace App\Repositories;


use App\Models\Match;
use App\Repositories\Interfaces\MatchInterface;

class MatchRepository implements MatchInterface
{
    /**
     * @var Match
     */
    private $match;

    public function __construct(Match $match)
    {
        $this->match = $match;
    }

    public function allByWeek(int $week, array $with = [])
    {
        return $this->match
            ->when($with, function ($q) use ($with) {
                $q->with($with);
            })
            ->where('week', $week)
            ->get();
    }

    public function create(array $result)
    {
        // TODO: Implement create() method.
    }
}
