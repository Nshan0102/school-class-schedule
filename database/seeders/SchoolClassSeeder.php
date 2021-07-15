<?php

namespace Database\Seeders;

use Database\Factories\SchoolClassFactory;
use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolClassFactory::times(50)->create();
    }
}
