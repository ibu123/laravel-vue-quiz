<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Google_Client;
class AuthController extends Controller
{

    public function login(Request $request)
    {
        try {
            $client = new Google_Client(['client_id' => env('GOOGLE_CLIENT_ID ')]);  // Specify the CLIENT_ID of the app that accesses the backend
            $payload = $client->verifyIdToken($request->credential);
            if ($payload) {
                $user = User::where([
                    'email' => $payload['email']
                ])->first();

                if($user) {
                    $user->update([
                        'google_id' => $payload['sub']
                    ]);
                } else {
                    $user = User::create([
                        'name' => $payload['name'],
                        'email' => $payload['email'],
                        'password' => \Hash::make(\Str::random(8)),
                        'google_id' => $payload['sub']
                    ]);
                }

                \Auth::login($user);

                return response()->json([
                    'success' => true,
                    'redirect_url' => route('attend-quiz')
                ],200);

            } else {

                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Login!'
                ],500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ],500);
        }
    }
}
