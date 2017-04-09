<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $table = 'activities';
    protected $fillable = ['name', 'slug'];

    public function schedules()
    {
        return $this->hasMany('App\Schedules', 'activity_id');
    }
}
