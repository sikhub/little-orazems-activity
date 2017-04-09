<?php

namespace App\Http\Controllers;

use App\Activities;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    /**
     * Show activity with scheduled dates
     * Query only dates which are happening in the future
     *
     * @param  $activity
     * @return  \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($activity)
    {
        $activity = Activities::where(['slug' => $activity])->firstOrFail();
        $schedules = $activity->schedules()->futureEvents()->orderBy('activity_start', 'asc')->get();
        return view('schedule.show', compact('schedules', 'activity'));
    }
}
