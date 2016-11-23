<?php

/*
 * This file is part of Laravel Payment Details.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\PaymentDetails\Models;

use Illuminate\Database\Eloquent\Model;
use BrianFaust\Eloquent\Models\Traits\EncryptAttributes;

class PaymentDetail extends Model
{
    use EncryptAttributes;

    protected $fillable = ['provider', 'identifier', 'data', 'checksum'];

    protected $casts = ['data' => 'array'];

    public function holder()
    {
        return $this->morphTo();
    }

    protected static function getEncryptedAttributes()
    {
        return config('payment-details.encrypt')
                    ? config('payment-details.encryptColumns')
                    : [];
    }
}
