<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedules extends Model
{
    protected $table = 'schedules';
    protected $fillable = ['activity_id', 'activity_start'];

    public function activity()
    {
        return $this->hasOne('App\Activities');
    }

    /**
     * Scope a query to only include current events
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFutureEvents($query)
    {
        return $query->where('activity_start', '>=', '2016-01-01 00:00:00');
    }
}
