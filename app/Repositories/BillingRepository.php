<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BillingRepositoryInterface;
use GuzzleHttp\Client;

class BillingRepository implements BillingRepositoryInterface
{
    public function getBill(array $uid)
    {
        $httpClient = new Client();
        $request = $httpClient->get('http://two.test/billing', [
            'query' => $uid
        ]);

        return $bills = json_decode($request->getBody()->getContents());
    }
}
