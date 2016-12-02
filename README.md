# Laravel Payment Details

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-payment-details
```

And then include the service provider within `app/config/app.php`.

``` php
BrianFaust\PaymentDetails\PaymentDetailsServiceProvider::class
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

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.de)
