<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Front End', 'Back End', 'UI', 'UX', 'Full Stack'];

        foreach ($tags as $tag) {

            $new_tag = new Tag();


            $new_tag->name = $tag;
            $new_tag->slug = Str::slug($tag, '-');

            $new_tag->save();
        }
    }
}
