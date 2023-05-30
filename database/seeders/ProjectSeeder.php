<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i<20; $i++){
            $newProject = new Project();
            $newProject->title = $faker->sentence(5);
            $newProject->description = $faker->text(300);
            $newProject->slug = Str::slug($newProject->title, '-');
            $newProject->cover_image = 'https://picsum.photos/500/300';
            $newProject->type_id = $faker->randomElement(Type::pluck('id'));
            $newProject->save();
        }
    }
}
