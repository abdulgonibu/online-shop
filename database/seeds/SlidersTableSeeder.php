<?php

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 5) as $index) {
            $brand = $faker->name;
            Slider::create([
                'title'     => $faker->sentence,
                'sub_title' => $faker->paragraph,
                'image'     => $faker->imageUrl(),
                'url'       => $faker->imageUrl(),
                'start'     => $faker->date(),
                'end'       => $faker->date(),
                'status'    => $this->getRandomStatus()
            ]);
        }
    }


    /**
     * @return mixed
     */
    public function getRandomStatus()
    {
        # Generate random status
        $statuses = array('active', 'inactive');
        return $statuses[array_rand($statuses)];
    }
}
