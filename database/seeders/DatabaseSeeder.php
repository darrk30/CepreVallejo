<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        //Storage::deleteDirectory('public/images');
        //Storage::makeDirectory('public/images'); 
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        //Category::factory(4)->create();
        //$this->call(CursoSeeder::class);
        
    }
}
