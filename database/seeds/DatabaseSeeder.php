<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Activities::class, rand(10, 70))->create()->each(function ($a) {
            factory(App\Schedules::class, rand(10,70))->create(['activity_id' => $a->id]);
        });
    }
}
