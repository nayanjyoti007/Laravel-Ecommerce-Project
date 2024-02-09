<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        $this->validate($request, [
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:6', 'same:confirm_password'],
        ]);

        $user = User::where('id',Auth::guard('web')->user()->id)->first();

        if(Hash::check($request->input('current_password'), $user->password)){
            User::where('id',Auth::guard('web')->user()->id)->update([
            'password'=>Hash::make($request->input('new_password')),
            ]);
            return redirect()->back()->with('success','Password Changed Successfully');
        }else{
            return redirect()->back()->with('error','Sorry Current Password Does Not Correct');
        }
    }
}
