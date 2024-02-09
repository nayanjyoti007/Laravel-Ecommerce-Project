<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{

    public function index(){
        return view('user.login');
    }


    public function register(){
        return view('user.register');
    }

    public function registerSubmit(Request $request){

        $this->validate($request, [
            'fullname' => 'required|string|max:100',
            'mobile' => 'required|numeric|digits:10|regex:/^(\+91[\-\s]?)?[6789]\d{9}$/|unique:users,mobile',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'required|min:6',
        ]);


        try {
            // Start a database transaction

            $user = new User();
            $user->fullname = $request->fullname;
            $user->password = Hash::make($request->input('password'));
            $user->mobile = $request->mobile;
            $user->email = $request->email;

            // Save the user
            $user->save();

            // Commit the database transaction
            DB::commit();

            return response()->json(['status' => 200, 'message' => "Registration Successfull Completed"]);
        } catch (\Exception $e) {
            Log::error($e);
            // An error occurred, rollback the database transaction
            DB::rollback();

            // Handle the exception, log it, or return an error response
            return response()->json(['status' => 500, 'message' => 'An error occurred']);
        }

    }


    public function login(){
        return view('user.login');
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
            return redirect()->route('user.dashboard');
            // return response()->json(['status' => 200, 'message' => "Login Successfull"]);
        } else {
            // return response()->json(['status' => 400, 'message' => "Username & Password Incorrect"]);
            return back()->with('error', 'Username & Password Incorrect');
        }
    }

    public function logout(Request $request)
    {
        // $request->session()->flush();
        // Auth::logout();

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect()->route('user.login');
    }
}
