<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    protected $guard = 'admin';
    //
public function AdminLogin()
    {
        return view('adminAuth.admin-login');
    }

    public function AdminDashboard()
    {
        return view('adminAuth.home.dashboard');
    }
    public function AdminProfile()
    {
        return view('adminAuth.home.my-profile');
    }
    public function AdminNewsEvents()
    {
        return view('adminAuth.websiteContent.news-and-events');
    }
    public function AdminPlansPrices()
    {
        return view('adminAuth.websiteContent.plans-and-prices');
    }
    public function AdminAboutUs()
    {
        return view('adminAuth.websiteContent.about-us');
    }
    public function AdminUserAccounts()
    {
        return view('adminAuth.customerManage.user-accounts');
    }
    public function AdminSubscriptions()
    {
        return view('adminAuth.customerManage.subscriptions');
    }
    public function AdminUsers()
    {
        return view('adminAuth.adminManage.users', [
            'admins' => Admin::all()
        ]);
    }

    public function AdminLoginUser(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ],
        [
            'username.required' => 'Empty fields',
            'password.required' => 'Empty fields',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {

            return redirect()->intended('/admin/home');
        }

        // Authentication failed, redirect back with an error message
        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function createAdminUser(Request $request)
    {
        // Validation rules for the form fields

        $inputData = $request->validate(
            [
                'fullName' => 'required',
                'username' => ['required', Rule::unique('admins', 'username')],
                'password' => ['required', 'confirmed', 'min:6'],
            ],
            [
                'fullName.required' => 'Empty fields',
                'username.required' => 'Empty fields',
                'password.required' => 'Empty fields',
                'password.confirmed' => 'Password didn\'t match',
                'username.unique' => 'Username already in use',
            ],
        );

        // Create a new admin user
        $admin = new Admin;
        $admin->fullName = $inputData['fullName'];
        $admin->username = $inputData['username'];
        $admin->password = bcrypt($inputData['password']);
        $admin->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Admin user created successfully.');
    }
public function AdminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
