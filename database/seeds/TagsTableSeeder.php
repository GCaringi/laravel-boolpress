<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
     $tags = ['html', 'css', 'php', 'js'];
     
        foreach($tags as $tag){
            $tmpTag = new Tag();
            $tmpTag->name = $tag;
            $tmpTag->save();
        }
    }
}
