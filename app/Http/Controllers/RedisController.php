<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class RedisController extends Controller
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

    public function redis(Request $request)
    {
        $token = $request->bearerToken();

        if (app('redis')->exists('token')) {
            $response = Http::withToken($token)->put('http://two.test/payment', [
                'amount' => 200
            ]);
//            dd($response->json());
            if ($response->successful()) {
                return response()->json($response->collect(), 200);
            } else {
                return response()->json($response->body(), Response::HTTP_NOT_ACCEPTABLE);
            }
        } else {
            dd('Token redis expired');
        }
    }
}
