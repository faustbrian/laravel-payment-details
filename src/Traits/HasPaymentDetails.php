<?php

namespace BrianFaust\PaymentDetails\Traits;

use BrianFaust\PaymentDetails\Models\PaymentDetail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use InvalidArgumentException;

trait HasPaymentDetails
{
    public function paymentDetails()
    {
        return $this->morphMany(PaymentDetail::class, 'detailable');
    }

    public function addPaymentDetails($provider, $data, $identifier)
    {
        $provider = $this->buildPaymentDetailProvider($provider);

        $missingFields = [];
        foreach ($provider->getFields() as $field) {
            if (!array_key_exists($field, $data)) {
                $missingFields[] = $field;
            }
        }

        if ($missingFields) {
            throw new InvalidArgumentException('The ['.implode(', ', $missingFields).'] fields are missing.');
        }

        return $this->firstOrNewPaymentDetail($provider, $identifier, $data);
    }

    public function getPaymentDetails($provider, $identifier = null)
    {
        $provider = $this->buildPaymentDetailProvider($provider);

        $query = $this->paymentDetails()->where('provider', '=', $provider->getIdentifier());

        if ($identifier) {
            $query = $query->where('identifier', '=', $identifier);
        }

        return $identifier ? $query->firstOrFail() : $query->get();
    }

    private function firstOrNewPaymentDetail($provider, $identifier, $data)
    {
        $data = array_only($data, $provider->getFields());

        try {
            $result = PaymentDetail::where('provider', $provider->getIdentifier())
                                   ->where('identifier', $identifier)
                                   ->where('checksum', sha1(json_encode($data)))
                                   ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $result = $this->paymentDetails()->save(new PaymentDetail([
                'provider' => $provider->getIdentifier(),
                'identifier' => $identifier,
                'data' => $data,
                'checksum' => sha1(json_encode($data)),
            ]));
        }

        return $result;
    }

    private function buildPaymentDetailProvider($provider)
    {
        $providerClass = "BrianFaust\\PaymentDetails\\Providers\\$provider";

        if (!class_exists($providerClass)) {
            throw new InvalidArgumentException('The provider ['.$provider.'] is not supported.');
        }

        return new $providerClass();
    }
}
