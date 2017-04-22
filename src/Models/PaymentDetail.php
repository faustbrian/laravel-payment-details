<?php



declare(strict_types=1);

namespace BrianFaust\PaymentDetails\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Models\Traits\EncryptAttributes;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class PaymentDetail extends Model
{
    use EncryptAttributes;

    protected $fillable = ['provider', 'identifier', 'data', 'checksum'];

    protected $casts = ['data' => 'array'];

    public function holder(): MorphTo
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
