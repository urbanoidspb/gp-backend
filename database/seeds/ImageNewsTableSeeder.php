<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageNewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('image_news')->insert(
            [
                'news_id' => factory(\App\Models\News::class)->create()->id,
                'image_id' => factory(\App\Models\Image::class)->create()->id,
            ]
        );
    }
}
