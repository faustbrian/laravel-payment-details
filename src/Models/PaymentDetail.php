<?php

/*
 * This file is part of Laravel Payment Details.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\PaymentDetails\Models;

use Illuminate\Database\Eloquent\Model;
use DraperStudio\Eloquent\Models\Traits\EncryptAttributes;

/**
 * Class PaymentDetail.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class PaymentDetail extends Model
{
    use EncryptAttributes;

    /**
     * @var array
     */
    protected $fillable = ['provider', 'identifier', 'data', 'checksum'];

    /**
     * @var array
     */
    protected $casts = ['data' => 'array'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function holder()
    {
        return $this->morphTo();
    }

    /**
     * @return array|mixed
     */
    protected static function getEncryptedAttributes()
    {
        return config('payment-details.encrypt')
                    ? config('payment-details.encryptColumns')
                    : [];
    }
}
