<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePasswordForm()
    {
        return view('admin.change_password');
    }

    public function changePassword(Request $request)
    {

        // $userRoles = Auth::user()->getRoleNames();
        // dd($userRoles->isNotEmpty() ? $userRoles->first() : 'admin');


        // dd(Auth::user()->hasAnyPermission('change.form.two'));


        $this->validate($request, [
            // 'manager_name' => [
            //     Auth::user()->hasAnyPermission(['change.form.two']) ? 'required' : 'nullable',
            //     'string',
            // ],
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:6', 'same:confirm_password'],
        ]);


        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();

        if (Hash::check($request->input('current_password'), $admin->password)) {
            Admin::where('id', Auth::guard('admin')->user()->id)->update([
                'password' => Hash::make($request->input('new_password')),
            ]);

            $notification = array('message' => "Password Changed Successfully", 'alert-type' => 'success');

            return redirect()->back()->with($notification);
            // return redirect()->back()->with('success', 'Password Changed Successfully');
        } else {
            $notification = array('message' => "Sorry Current Password Does Not Correct", 'alert-type' => 'warning');

            return redirect()->back()->with($notification);
            // return redirect()->back()->with('error', 'Sorry Current Password Does Not Correct');
        }
    }
}
