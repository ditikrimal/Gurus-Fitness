<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Seshac\Otp\Otp;


class UserController extends Controller
{
    //
    public function login()
    {
        return view('users.userLogin');
    }
    public function signup()
    {
        return view('users.userAuthentication');
    }
    public function sendOTPEmail($name, $email, $otp)
    {
        $data = ['name' => $name, 'otp' => $otp];
        $user['to'] = $email;
        Mail::send('email.otpMail', $data, function ($messages) use ($user) {
            $messages->to($user['to']);
            $messages->subject('Your OTP for verification');
        });
    }

    public function sendVerifyMail($name, $email, $otp)
    {
        $data = ['name' => $name, 'otp' => $otp];
        $user['to'] = $email;
        Mail::send('email.verifyMail', $data, function ($messages) use ($user) {
            $messages->to($user['to']);
            $messages->subject('Your verification link');
        });
    }
    public function createUser(Request $request)
    {

        $inputData = $request->validate(

            [
                'fullName' => 'required',
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'confirmed', 'min:6']

            ],
            [
                'fullName.required' => 'Empty fields',
                'email.required' => 'Empty fields',
                'password.required' => 'Empty fields',
                'password.confirmed' => 'Password didn\'t match',
                'email.unique' => 'Email already in use',

            ]
        );

        $inputData['password'] = bcrypt(($inputData['password']));

        $otp = rand(10000, 99999);
        $inputData['otp'] = $otp;
        $user = User::create($inputData);


        $this->sendOTPEmail($inputData['fullName'], $inputData['email'], $otp);
    }
    public function logout(Request $request)
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        session()->flash('createMessage', 'Logged out Successfully!');
        session()->flash('messageColor', 'crimson'); // Replace with the desired background color

        // Redirect the user to a specific route
        return redirect()->route('index');
    }
    public function loginUser(Request $request)
    {
        $inputData = $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Empty fields',
                'password.required' => 'Empty fields',
            ]
        );

        $user = User::where('email', $inputData['email'])->first();
        $otp = User::where('email', $inputData['email'])->value('otp');
        $fullName = User::where('email', $inputData['email'])->value('fullName');




        if ($user && !$user->is_verified) {
            $this->sendVerifyMail($fullName, $inputData['email'], $otp);
            return back()->withErrors(['email' => 'Email is not verified. Verification link has been sent to the mail'])->onlyInput();
        }

        if (auth()->attempt($inputData)) {
            $request->session()->regenerate();
            session()->flash('createMessage', 'Logged in Successfully!');
            session()->flash('messageColor', 'lime'); // Replace with the desired background color

            // Redirect the user to a specific route
            return redirect()->route('index'); // Replace 'your.route.name' with the actual route name
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput();
    }


    public function resendOTP(Request $request)
    {
    }

    public function verifyOTP(Request $request)
    {
        $otp = $request->input('otp');
        $user = User::where('otp', $otp)->first();
        if ($user) {
            $user->is_verified = true;
            $user->email_verified_at = \Carbon\Carbon::now();

            $user->save();
            auth()->login($user);
            session()->flash('createMessage', 'User Created Successfully!');
            session()->flash('messageColor', 'lime'); // Replace with the desired background color
            return response()->json(['message' => 'User Created Successfully!'], 200);
        } else {
            return response()->json(['errors' => ['otp' => ['Invalid OTP']]], 422);
        }
    }
    public function VerifyLink($otp)
    {
        $user = User::where('otp', $otp)->first();
        if ($user) {
            $user->is_verified = true;
            $user->email_verified_at = \Carbon\Carbon::now();

            $user->save();
            auth()->login($user);
            session()->flash('createMessage', 'Email Verified Successfully!');
            session()->flash('messageColor', 'lime'); // Replace with the desired background color

            // Redirect the user to a specific route
            return redirect()->route('index'); // Replace with the desired background color
        }
    }
}
