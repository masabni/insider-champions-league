<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\WeekInterface;
use Illuminate\Http\Request;

class WeeksController extends Controller
{
    /**
     * @var WeekInterface
     */
    private $week;

    public function __construct(WeekInterface $week)
    {
        $this->week = $week;
    }

    public function current()
    {
        return response()->json([
            'week' => $this->week->getCurrentWeek(),
        ]);
    }
}
