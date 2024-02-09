<?php

namespace App\Http\Controllers\FrontEnd\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('frontend.userPanel.login');
    }

    public function loginSubmit(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'mobile' => 'required|numeric|digits:10|regex:/^(\+91[\-\s]?)?[6789]\d{9}$/',
            'password' => 'required',
        ]);

        $userCredential = $request->only('mobile', 'password');
        if (Auth::guard('web')->attempt($userCredential)) {

            $msg = "Login Successfull :)";
            $notification = array('message' => $msg, 'alert-type' => 'success');
            return redirect()->route('user.dashboard')->with($notification);

            // return response()->json(['status' => 200, 'message' => "Login Successfull"]);
        } else {
            $msg = "Username & Password Incorrect !!";
            $notification = array('message' => $msg, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    public function logout(Request $request)
    {
        // $request->session()->flush();
        // Auth::logout();

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $msg = "Logout Successfully";
        $notification = array('message' => $msg, 'alert-type' => 'success');
        return redirect()->route('user.login')->with($notification);
    }
}
