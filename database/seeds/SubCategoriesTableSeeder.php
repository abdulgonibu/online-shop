<?php

use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategoriesTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$faker = Faker\Factory::create();

foreach (range(1, 50) as $index) {
$category = $faker->name;
SubCategory::create([
'category_id' => rand(1, 10),
'name'        => $category,
'slug'        => slugify($category),
'status'      => $this->getRandomStatus()
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
