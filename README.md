# Laravel Payment Details

[![Build Status](https://img.shields.io/travis/faustbrian/Laravel-Payment-Details/master.svg?style=flat-square)](https://travis-ci.org/faustbrian/Laravel-Payment-Details)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/faustbrian/laravel-payment-details.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/faustbrian/Laravel-Payment-Details.svg?style=flat-square)](https://github.com/faustbrian/Laravel-Payment-Details/releases)
[![License](https://img.shields.io/packagist/l/faustbrian/Laravel-Payment-Details.svg?style=flat-square)](https://packagist.org/packages/faustbrian/Laravel-Payment-Details)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-payment-details
```

### Migration

To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish --provider="BrianFaust\PaymentDetails\PaymentDetailsServiceProvider"
```

And then run the migrations to setup the database table.

```bash
$ php artisan migrate
```

## Usage

##### Setup a Model

``` php
<?php


namespace App;

use BrianFaust\PaymentDetails\Traits\HasPaymentDetails;
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

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@brianfaust.me. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.me)
