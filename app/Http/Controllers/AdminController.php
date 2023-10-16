<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
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
            'admins' => Admin::latest()->filter(request(['search']))->paginate(10),
        ]);
    }

    public function AdminLoginUser(Request $request)
    {
        $this->validate(
            $request,
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'Empty fields',
                'password.required' => 'Empty fields',
            ]
        );

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
                'created_by' => 'required',
                'role'=> 'required'

            ],
            [
                'fullName.required' => 'Empty fields',
                'username.required' => 'Empty fields',
                'password.required' => 'Empty fields',
                'role.required' => 'Empty fields',
                'password.confirmed' => 'Password didn\'t match',
                'username.unique' => 'Username already in use',
            ],
        );

        // Create a new admin user
        $admin = new Admin;
        $admin->fullName = $inputData['fullName'];
        $admin->username = $inputData['username'];
        $admin->password = bcrypt($inputData['password']);
        $admin->created_by = $inputData['created_by'];
        $admin->role = $inputData['role'];
        $admin->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Admin user created successfully.');
    }
    public function AdminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
    public function deleteAdminUser(Request $request)
    {
        // Get the ids from the request
        $ids = $request->input('ids');

        // Get the currently logged-in admin
        $loggedInAdmin = Auth::guard('admin')->user();

        // Check if the logged-in admin is a super admin
        if ($loggedInAdmin->role === 'Super-Admin') {
            // Super admin can delete any user except themselves
            $ids = array_diff($ids, [$loggedInAdmin->id]);
            Admin::whereIn('id', $ids)->delete();
            return response()->json(['message' => 'Selected user/s deleted except unprivileged'], 200);
        } elseif ($loggedInAdmin->role === 'Admin') {
            // Normal admin can delete other normal admins, not super-admins or themselves
            $ids = array_diff($ids, [$loggedInAdmin->id]);
            $superAdminIds = Admin::whereIn('id', $ids)->where('role', 'Super-Admin')->pluck('id')->toArray();
            Admin::whereNotIn('id', $superAdminIds)->whereIn('id', $ids)->delete();
            return response()->json(['message' => 'Selected user/s deleted except unprivileged'], 200);
        } else {
            // Other roles are not allowed to delete
            return response()->json(['message' => 'You do not have permission to delete users.'], 403);
        }
    }



}
