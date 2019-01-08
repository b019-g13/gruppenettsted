<?php

use App\PostType;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostType::create(['name' => 'Offentlig', 'slug' => 'public']);
        PostType::create(['name' => 'Privat',    'slug' => 'private']);
        PostType::create(['name' => 'Passordbeskyttet', 'slug' => 'password-protected']);
    }
}
