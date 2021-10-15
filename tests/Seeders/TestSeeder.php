<?php

namespace Tests\Seeders;

use DutchCodingCompany\SeedOnce\Once;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    use Once;

    public static int $seeded = 0;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        static::$seeded++;
    }
}
