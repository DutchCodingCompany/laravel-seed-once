# Laravel Seed Once

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dutchcodingcompany/laravel-seed-once.svg?style=flat-square)](https://packagist.org/packages/dutchcodingcompany/laravel-seed-once)
[![Total Downloads](https://img.shields.io/packagist/dt/dutchcodingcompany/laravel-seed-once.svg?style=flat-square)](https://packagist.org/packages/dutchcodingcompany/laravel-seed-once)

This package provides a simple way to run seeders just once, even when called multiple times.

## Installation

You can install the package via composer:

```bash
composer require dutchcodingcompany/laravel-seed-once
```

## Usage

Marking a seeder to run just once is as simple as using the
`Once` trait in you seeder.

```php 
<?php

namespace DutchCodingCompany\SeedOnce;

use DutchCodingCompany\SeedOnce\Once;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    use Once;
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        //
    }
}
```

Below is an example using a permission seeder and a user seeder which depends on the permission seeder.

```sh
# Seed permissions
Seeding: DutchCodingCompany\SeedOnce\PermissionSeeder
Seeded:  DutchCodingCompany\SeedOnce\PermissionSeeder (12.86ms)
...

# Seed users
# Because we want to make sure the permissions have been seeded
# call the permission seeder again in the user seeder.
Seeding: DutchCodingCompany\SeedOnce\UserSeeder
Seeding: DutchCodingCompany\SeedOnce\PermissionSeeder
Skipped: DutchCodingCompany\SeedOnce\PermissionSeeder # Skipped
Seeded:  DutchCodingCompany\SeedOnce\PermissionSeeder (0.01ms)
Seeded:  DutchCodingCompany\SeedOnce\UserSeeder (12.76ms)
```

In case you need to know whether a seeder has run already you may use the provided `seeded` method.

```php
if($this->seeded(PermissionSeeder::class)) {
    //
}
```

## Testing

```bash
composer test
```

## Credits

- [Bjorn Voesten](https://github.com/bjornvoesten)
- [Dutch Coding Company](https://github.com/dutchcodingcompany)
- [All contributors](https://github.com/dutchcodingcompany/laravel-seed-once/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
