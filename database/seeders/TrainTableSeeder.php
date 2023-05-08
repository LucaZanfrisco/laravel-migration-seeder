<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TrainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 25; $i++) {
            $train = new Train();
            $train->company = $faker->company();
            $train->departure_station = $faker->city();
            $train->arrival_station = $faker->city();
            $train->departure_time = $faker->date('Y-m-d H:i:s');
            $train->arrival_time = $faker->date('Y-m-d H:i:s');
            $train->id_train = $faker->bothify('#####');
            $train->n_carriages = $faker->numberBetween(1, 20);
            $train->on_time = $faker->numberBetween(0,1);
            $train->is_deleted = $faker->numberBetween(0,1);
            $train->save();
        }
    }
}
