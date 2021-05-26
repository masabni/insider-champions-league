<?php

namespace Tests\Unit;

use App\Repositories\Interfaces\TeamInterface;
use App\Repositories\TeamRepository;
use App\Services\MatchmakingService;
use Tests\TestCase;

class MatchmakingServiceTest extends TestCase
{
    private $service;

    public function setUp(): void
    {
        parent::setUp();

        app()->bind(TeamInterface::class, TeamRepository::class);

        $this->service = app(MatchmakingService::class);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_scheduled_matches()
    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);

        $matches = $this->service->getScheduledMatches(2);

        print_r($matches);

        $this->assertIsArray($matches);
    }
}
