<?php

namespace App\Repositories\Interfaces;

interface BillingRepositoryInterface
{
    public function getBill(array $uid);
}
