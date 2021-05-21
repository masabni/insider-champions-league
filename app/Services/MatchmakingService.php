<?php


namespace App\Services;


class MatchmakingService
{
    public function getScheduledMatches(int $week)
    {
        // TODO formula to get the upcoming week matches
        return [
            1 => [
                ['home' => 1, 'away' => 2],
                ['home' => 3, 'away' => 4],
            ],
            2 => [
                ['home' => 1, 'away' => 2],
                ['home' => 3, 'away' => 4],
            ],
            3 => [
                ['home' => 1, 'away' => 2],
                ['home' => 3, 'away' => 4],
            ],
            4 => [
                ['home' => 1, 'away' => 2],
                ['home' => 3, 'away' => 4],
            ],
            5 => [
                ['home' => 1, 'away' => 2],
                ['home' => 3, 'away' => 4],
            ],
            6 => [
                ['home' => 1, 'away' => 2],
                ['home' => 3, 'away' => 4],
            ],
        ][$week];
    }

    public function play(array $match)
    {
        // TODO
        return [];
    }
}
