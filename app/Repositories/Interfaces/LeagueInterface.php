<?php


namespace App\Repositories\Interfaces;


interface LeagueInterface
{
    public function all(array $with = []);

    public function updateMatchLeaderboard(array $result);
}
