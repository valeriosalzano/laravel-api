<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i<5; $i++){
            $newTechnology = new Technology();
            $newTechnology->name = 'technology '.(count(Technology::all())+1);
            $newTechnology->description = $faker->text(200);
            $newTechnology->slug = Str::slug($newTechnology->name, '-');
            $newTechnology->save();
        }
    }
}