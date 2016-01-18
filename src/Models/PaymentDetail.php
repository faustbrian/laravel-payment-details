<?php

namespace DraperStudio\PaymentDetails\Models;

use Illuminate\Database\Eloquent\Model;
use DraperStudio\Database\Traits\Models\EncryptAttributes;

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
