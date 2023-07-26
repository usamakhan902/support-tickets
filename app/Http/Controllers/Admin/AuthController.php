<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function login(loginRequest $loginRequest)
    {
        $credentials = $loginRequest->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->route('admin.tickets')->with('success', 'Logged in Successfuly!');
        }
        return redirect()->back()->with('error', 'Login details are not valid.');
    }


    function UserLogin(UserLoginRequest $userLogin)
    {

        $credentials = $userLogin->only('email', 'name');
        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            Auth::login($user);
            $token =  $user->createToken('MyApp')->plainTextToken;
            return response()->json(['user' => $user, 'token' => $token]);
        } else {
            $newUser = new User;
            $newUser->email = $credentials['email'];
            $newUser->name = $credentials['name'] ?? "";
            $newUser->save();
            Auth::login($newUser);
            $token =  $newUser->createToken('MyApp')->plainTextToken;
            return response()->json(['user' => $newUser, 'token' => $token]);
        }
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
