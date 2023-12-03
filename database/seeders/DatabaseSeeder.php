<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Products::factory(10)->create(); 
    }
}
