<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;
use Faker\Provider\Lorem;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 0; $i < 5; $i++) {
            $new_post = new Post();

            $new_post->title = 'Post #' . ($i + 1);
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque officiis error ab eligendi cumque consequatur, maiores unde officia eum delectus laboriosam similique blanditiis ea, quod architecto vitae corporis! Optio, ut!';

            $new_post->save();
        }
    }
}
