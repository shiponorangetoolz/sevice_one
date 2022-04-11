<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function myfunction($v1, $v2)
    {
        if ($v1 === $v2) {
            return "same";
        }
        return "different";
    }


    public function index()
    {
        $users = User::select('uid', 'name', 'phone')->paginate(1);
        $uids = $users->pluck('uid')->toArray();

        $httpClient = new Client();
        $request = $httpClient->get('http://two.test/billing', [
            'query' => $uids
        ]);

        $bills = json_decode($request->getBody()->getContents());

        foreach ($users as $user) {
            $bill = collect($bills)->where('user_id',$user->uid)->first();
            $user->package_name = $bill->name;
            $user->amount = $bill->amount;
        }

        return response()->json($users);
    }

}
