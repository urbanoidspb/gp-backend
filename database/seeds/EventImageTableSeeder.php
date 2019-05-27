<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_image')->insert(
            [
                'event_id' => factory(\App\Models\Event::class)->create()->id,
                'image_id' => factory(\App\Models\Image::class)->create()->id,
            ]
        );
    }
}
