<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('album_image')->insert(
            [
                'album_id' => factory(\App\Models\Album::class)->create()->id,
                'image_id' => factory(\App\Models\Image::class)->create()->id,
            ]
        );
    }
}
