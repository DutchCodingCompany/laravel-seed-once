<?php

namespace Tests;

use Orchestra\Testbench\TestCase;
use Tests\Seeders\TestSeeder;

class SeedTest extends TestCase
{
    /**
     * Test whether the seeder runs only once even when called multiple times.
     *
     * @return void
     */
    public function testSeederRunsOnce(): void
    {
        static::assertSame(0, TestSeeder::$seeded);
        $this->seed(TestSeeder::class);
        static::assertSame(1, TestSeeder::$seeded);
        $this->seed(TestSeeder::class);
        static::assertSame(1, TestSeeder::$seeded);
    }
}
