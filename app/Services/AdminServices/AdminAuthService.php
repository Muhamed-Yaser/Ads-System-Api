<?php

namespace App\Services\AdminServices;

use Illuminate\Support\Facades\Auth;


class AdminAuthService
{

    public function loginAdmin($request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $request->session()->regenerate();
            return redirect()->route('Dashboard.index');
        } else {

            return redirect()->back()->withErrors(['email' => 'الميل غير صحيح', 'password' => 'الباس غير صحيح']);
        }
    }

    public function checkAuthenticated()
    {
        if (!auth()->check()) {

            return redirect()->route('auth.login');
        }
    }

    public function profileAdmin()
    {
        $this->checkAuthenticated();
        return view('Dashboard.profile');
    }

    public function editProfileAdmin()
    {
        $admin = auth()->user();
        return view('Dashboard.editProfile', compact('admin'));
    }

    public function updateProfileAdmin($request)
    {
        $admin = auth()->user();

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->save();

        return redirect()->route('Dashboard.editProfile')->with('success', 'Profile updated successfully');
    }
}