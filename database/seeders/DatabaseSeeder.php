<?php

namespace Database\Seeders;



use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(11)->create();
        // \App\Models\User::factory(10)->create();
        // Product::factory()->times(100)->create(); //  juhul kui tahad otse databaseseederist seedida pead lisama ka use App\Models\Product;
        $this->call(ProductSeeder::class);  //  kui tahad otse ProductSeeder.php failist käivitada
    }
}
