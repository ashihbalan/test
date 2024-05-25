<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\PassRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function authForm()
    {
        return view('auth');
    }
    public function auth(AuthRequest $request)
    {

        $user = User::where('mobile', $request->mobile)->first();
        $password = rand(111, 9999);
        Log::info('$password');
        if (!$user) {
            $user = User::create([
                'mobile' => $request->mobile,
                'password' => Hash::make('$password'),

            ]);
        }
        return redirect()->route('password', []);

    }
    public function passForm()
    {
        return view('password');
    }
    public function pass(PassRequest $request)
    {
    }
}
