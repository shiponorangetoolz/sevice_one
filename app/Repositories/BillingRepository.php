<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BillingRepositoryInterface;
use GuzzleHttp\Client;

class BillingRepository implements BillingRepositoryInterface
{
    public function getBill(array $uids)
    {
        $httpClient = new Client();
        $request = $httpClient->get('http://two.test/billing', [
            'query' => $uids
        ]);

        return $bills = json_decode($request->getBody()->getContents());
    }
}
