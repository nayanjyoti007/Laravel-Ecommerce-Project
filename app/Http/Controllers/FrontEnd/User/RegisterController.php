<?php

namespace App\Http\Controllers\FrontEnd\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function register(){
        return view('frontend.userPanel.register');
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
            $user->profile = 1;

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
}
