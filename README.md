# Laravel Payment Details

## Installation

First, pull in the package through Composer.

```js
composer require draperstudio/laravel-payment-details:1.0.*@dev
```

And then, if using Laravel 5, include the service provider within `app/config/app.php`.

```php
'providers' => [
    // ... Illuminate Providers
    // ... App Providers
    DraperStudio\PaymentDetails\ServiceProvider::class
];
```

## Migration

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

```php
<?php

namespace App;

use DraperStudio\PaymentDetails\Traits\HasPaymentDetails;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasPaymentDetails;
}
```

##### Add new credit card details for billing

```php
$user->addPaymentDetails('CreditCard', [
    'type' => $faker->creditCardType,
    'name' => $faker->name,
    'number' => $faker->creditCardNumber,
    'expiration_date' => $faker->creditCardExpirationDate,
], 'billing');
```

##### Get all credit card details

```php
$user->getPaymentDetails('CreditCard');
```

##### Get the credit card details that have been stored for billing

```php
$user->getPaymentDetails('CreditCard', 'billing');
```

## License

Laravel Payment Details is licensed under [The MIT License (MIT)](LICENSE).
