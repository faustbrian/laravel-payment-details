# Laravel Payment Details

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require draperstudio/laravel-payment-details
```

And then, if using Laravel 5, include the service provider within `app/config/app.php`.

``` php
'providers' => [
    // ... Illuminate Providers
    // ... App Providers
    DraperStudio\PaymentDetails\ServiceProvider::class
];
```

### Migration

To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish --provider="DraperStudio\PaymentDetails\ServiceProvider"
```

And then run the migrations to setup the database table.

```bash
$ php artisan migrate
```

## Usage

##### Setup a Model

``` php
<?php

/*
 * This file is part of Laravel Payment Details.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App;

use DraperStudio\PaymentDetails\Traits\HasPaymentDetails;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasPaymentDetails;
}
```

##### Add new credit card details for billing

``` php
$user->addPaymentDetails('CreditCard', [
    'type' => $faker->creditCardType,
    'name' => $faker->name,
    'number' => $faker->creditCardNumber,
    'expiration_date' => $faker->creditCardExpirationDate,
], 'billing');
```

##### Get all credit card details

``` php
$user->getPaymentDetails('CreditCard');
```

##### Get the credit card details that have been stored for billing

``` php
$user->getPaymentDetails('CreditCard', 'billing');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email hello@draperstudio.tech instead of using the issue tracker.

## Credits

- [DraperStudio][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/DraperStudio/laravel-payment-details.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/DraperStudio/Laravel-Payment-Details/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/DraperStudio/laravel-payment-details.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/DraperStudio/laravel-payment-details.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/DraperStudio/laravel-payment-details.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/DraperStudio/laravel-payment-details
[link-travis]: https://travis-ci.org/DraperStudio/Laravel-Payment-Details
[link-scrutinizer]: https://scrutinizer-ci.com/g/DraperStudio/laravel-payment-details/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/DraperStudio/laravel-payment-details
[link-downloads]: https://packagist.org/packages/DraperStudio/laravel-payment-details
[link-author]: https://github.com/DraperStudio
[link-contributors]: ../../contributors
