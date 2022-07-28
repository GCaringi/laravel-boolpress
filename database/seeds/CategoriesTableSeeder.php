<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Front End", "Back End", "Full Stack", "Dev Ops"];
        foreach ($categories as $category){
            $tmpCategory = new Category();
            $tmpCategory->name = $category;
            $tmpCategory->save();
        }
    }
}
