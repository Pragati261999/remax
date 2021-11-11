<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends AppBaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'contact' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6'
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors();
            $message = "Please check the format of all fields";
            return $this->sendError($message, $error, 422);
        }

        $validated = $validator->validated();

        // dd($validated);

        $user = User::create([
            'name' => $validated['name'],
            'contact' => $validated['contact'],
            'email' => $validated['email'],
            'password' => bcrypt($request->password),
        ]);

        $ut = $user->createToken('remax_auth')->plainTextToken;
        $ut = explode('|', $ut)[1];

        $token = [
            'token' => $ut,
            'user' => $user
        ];


        return $this->sendResponse('Successfully registered', $token);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            $message = "User details are not valid.";
            return $this->sendError($message, $error, 401);
        }

        $attr = $request->all();

        if (!Auth::attempt($attr)) {
            return $this->sendError('Credentials not match', '', 401);
        }

        $ut = auth()->user()->createToken('remax_auth')->plainTextToken;
        $ut = explode('|', $ut)[1];

        $f = Favourite::where(['user_id' => auth()->user()->id])->get();

        $token = [
            'token' => $ut,
            'user' => auth()->user(),
            'favourites' => $f,
        ];

        return $this->sendResponse("Login success.", $token);
    }

    public function profile(Request $request)
    {
        return $request->user();
    }
}
