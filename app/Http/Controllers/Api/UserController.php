<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use App\Mail\ForgetPassword;
use App\Models\Favourite;
use App\Models\ForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserController extends AppBaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'bail|required|email|unique:users',
                'name' => 'bail|required|string|max:255',
                'contact' => 'bail|required',
                'password' => 'bail|required|string|min:6'
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
            'last_name' => $request->input('last_name'),
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

    public function logout(Request $request)
    {
        if (auth()->user()) {
            auth()->user()->tokens()->delete();
        }
        return $this->sendResponse("Logout success.", []);
    }

    public function update(Request $request)
    {
        // dd($request->contact);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'contact' => 'required|min:10',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            $message = "Validation failed";
            $this->sendError($message, $error, 422);
        }

        $validated = $validator->validated();

        $id = auth()->user()->id;
        // dd($id);
        if ($validated) {
            $u = User::where(['id' => $id])->update(['name' => $request->name, 'last_name' => $request->last_name, 'contact' => $request->contact]);
            $u = User::where(['id' => $id])->first();
            return $this->sendResponse('User data updated successfully', $u);
        } else {
            return $this->sendError('Error', "We are not update your details");
        }
    }

    public function updatePassword(Request $request)
    {
        // dd($request->contact);
        $validator = Validator::make($request->all(), [
            'old' => 'required|current_password:sanctum',
            'newPassword' => 'bail|required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            $message = "Validation error.";
            $this->sendError($message, $error, 422);
        }

        $validated = $validator->validated();

        $id = auth()->user()->id;

        User::where(['id' => $id])->update(['password' => bcrypt($request->newPassword)]);

        return $this->sendResponse('User data updated successfully', []);
    }

    public function profile(Request $request)
    {
        return $request->user();
    }

    public function sendResetPasswordLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            $message = "Validation error.";
            $this->sendError($message, $error, 422);
        }

        $validator->validated();

        // ===================

        // Check in DB if not create one if exists email - remove and create
        $key = md5(microtime() . rand());

        ForgotPassword::where(['email' => $request->email])->delete();

        ForgotPassword::create([
            'email' => $request->email,
            'key' => $key
        ]);

        $data = [
            'subject' => "Forgot Password | casamania.ca",
            'url' => 'http://casamania.ca/reset-password?key=' . $key . '&email=' . $request->email
        ];

        // Send email with reset password link
        Mail::to($request->email)->send(new ForgetPassword($data));
        // ===================

        return $this->sendResponse('Password reset link sent to your email. Please check your inbox.', []);
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'newPassword' => 'bail|required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            $message = "Validation error.";
            $this->sendError($message, $error, 422);
        }

        $validator->validated();

        $v = ForgotPassword::where([
            'key' => $request->key,
            'email' => $request->email
        ])->first();

        if (!is_null($v)) {

            User::where([
                'email' => $request->email
            ])->update([
                'password' => bcrypt($request->newPassword),
            ]);

            ForgotPassword::where([
                'email' => $request->email
            ])->delete();

            return $this->sendResponse('Password changed successfully. You can login now', $v);
        } else {
            return $this->sendError("Looks like the link has expired or is invalid. Try to resend link again.", null, 422);
        }
        // ===================

    }
}
