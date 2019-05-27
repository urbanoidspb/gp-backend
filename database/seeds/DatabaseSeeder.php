<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            ImagesTableSeeder::class,
            NewsTableSeeder::class,
            EventsTableSeeder::class,
            AlbumsTableSeeder::class
        ]);

        $this->call([
            AlbumImageTableSeeder::class,
            EventImageTableSeeder::class,
            ImageNewsTableSeeder::class
        ]);
    }
}
