<?php

namespace Database\Seeders;

use App\Models\Post;
use \App\Models\User;
use App\Models\Category;
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
        User::factory(9)->create();

        User::create([
            'name' => 'Ahmad Muzayyin',
            'username' => 'ahmad',
            'address' => 'Gadu Barat Ganding Sumenep',
            'email' => 'ahmad@lpi-arroqy.com',
            'password' => bcrypt('12345'),
            'email_verified_at' => now()
        ]);
        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        
        Post::factory(100)->create();

    }
}
