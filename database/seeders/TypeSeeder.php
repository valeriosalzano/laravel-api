<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i<10; $i++){
            $newType = new Type();
            $newType->name = 'type '.(count(Type::all())+1);
            $newType->description = $faker->text(200);
            $newType->slug = Str::slug($newType->name, '-');
            $newType->save();
        }
    }
}
