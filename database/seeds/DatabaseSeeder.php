<?php

use App\Models\App;
use App\Models\User;
use App\Models\Metrics;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 3)->create();

        factory(App::class, 3)->create()->each(function (App $app) {
            $app->metrics()->save(factory(Metrics::class)->make());
        });
    }
}
