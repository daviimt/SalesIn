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
        // $this->call(UsersTableSeeder::class);
        factory(\App\Cicles::class, 100)->create();
        factory(\App\Articles::class, 100)->create();
        factory(\App\User::class)->create(['email' => 'admin@admin.com', 'password' => 12345678, 'actived' => 1, 'email_verified_at' => "1999-01-01 00:00:00"]);
        factory(\App\User::class, 100)->create();
        factory(\App\Offers::class, 100)->create();
        factory(\App\Requirements::class, 100)->create();
        factory(\App\Applied::class, 100)->create();
    }
}
