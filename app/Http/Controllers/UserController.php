<?php

namespace App\Http\Controllers;

use App\Repositories\BillingRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use GuzzleHttp\Client;

class UserController extends Controller
{

    private $userRepository;
    private $billingRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository,BillingRepository $billingRepository)
    {
        $this->userRepository = $userRepository;
        $this->billingRepository = $billingRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAll();
        $uids = $users->pluck('uid')->toArray();

        $bills = $this->billingRepository->getBill($uids);

        foreach ($users as $user) {
            $bill = collect($bills)->where('user_id', $user->uid)->first();
            $user->package_name = $bill->name;
            $user->amount = $bill->amount;
        }

        return response()->json($users);
    }

}
