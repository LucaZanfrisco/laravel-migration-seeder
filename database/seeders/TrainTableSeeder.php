<?php

namespace Database\Seeders;

use App\Models\Train;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Mockery\Expectation;

class TrainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $trains = $this->getTrainCSV();
        foreach ($trains as $value) {
            $train = new Train();
            $train->company = $value['company'];
            $train->departure_station = $value['departure_station'];
            $train->arrival_station = $value['arrival_station'];
            $train->departure_time = $value['departure_time'];
            $train->arrival_time = $value['arrival_time'];
            $train->id_train = $value['id_train'];
            $train->n_carriages = $value['n_carriages'];
            $train->on_time = $value['on_time'];
            $train->is_deleted = $value['is_deleted'];
            $train->save();
        }

        // Seeding with Faker Method

        // for ($i = 0; $i < 25; $i++) {
        //     $train = new Train();
        //     $train->company = $faker->company();
        //     $train->departure_station = $faker->city();
        //     $train->arrival_station = $faker->city();
        //     $train->departure_time = $faker->date('Y-m-d H:i:s');
        //     $train->arrival_time = $faker->date('Y-m-d H:i:s');
        //     $train->id_train = $faker->bothify('#####');
        //     $train->n_carriages = $faker->numberBetween(1, 20);
        //     $train->on_time = $faker->numberBetween(0, 1);
        //     $train->is_deleted = $faker->numberBetween(0, 1);
        //     $train->save();
        // }
    }
    public function getTrainCSV()
    {
        $fileName = __DIR__ . '/csv/trains.csv';

        $labels = [
            'company',
            'departure_station',
            'arrival_station',
            'departure_time',
            'arrival_time',
            'id_train',
            'n_carriages',
            'on_time',
            'is_deleted'
        ];
        $results = [];
        $row = 1;
        if (($handle = fopen($fileName, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, null, ',')) !== FALSE) {
                if ($row === 1) {
                    $row++;
                } else {
                    foreach ($data as $key => $info) {
                        $label = $labels[$key];
                        $currentRow[$label] = $info;
                    }
                    $results[] = $currentRow;
                }
                $row++;
            }
            fclose($handle);
        }
        return $results;
    }
}
