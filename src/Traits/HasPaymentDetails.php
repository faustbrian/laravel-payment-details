<?php

/*
 * This file is part of Laravel Payment Details.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\PaymentDetails\Traits;

use DraperStudio\PaymentDetails\Models\PaymentDetail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use InvalidArgumentException;

/**
 * Class HasPaymentDetails.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
trait HasPaymentDetails
{
    /**
     * @return mixed
     */
    public function paymentDetails()
    {
        return $this->morphMany(PaymentDetail::class, 'detailable');
    }

    /**
     * @param $provider
     * @param $data
     * @param $identifier
     *
     * @return mixed
     */
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

    /**
     * @param $provider
     * @param null $identifier
     *
     * @return mixed
     */
    public function getPaymentDetails($provider, $identifier = null)
    {
        $provider = $this->buildPaymentDetailProvider($provider);

        $query = $this->paymentDetails()->where('provider', '=', $provider->getIdentifier());

        if ($identifier) {
            $query = $query->where('identifier', '=', $identifier);
        }

        return $identifier ? $query->firstOrFail() : $query->get();
    }

    /**
     * @param $provider
     * @param $identifier
     * @param $data
     *
     * @return mixed
     */
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

    /**
     * @param $provider
     *
     * @return mixed
     */
    private function buildPaymentDetailProvider($provider)
    {
        $providerClass = "DraperStudio\\PaymentDetails\\Providers\\$provider";

        if (!class_exists($providerClass)) {
            throw new InvalidArgumentException('The provider ['.$provider.'] is not supported.');
        }

        return new $providerClass();
    }
}
