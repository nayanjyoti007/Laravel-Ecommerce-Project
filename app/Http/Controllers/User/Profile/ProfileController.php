<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function form()
    {
        $id = Auth::guard('web')->user()->id;
        $data = User::findOrFail($id);
        return view('user.profile', compact('data'));
    }

    public function submit(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|numeric|exists:users,id',
            'profile' => 'nullable|image|mimes:jpg,jpeg,png',
            'fullname' => 'required|string|max:100',
            'mobile' => 'required|numeric|digits:10|regex:/^(\+91[\-\s]?)?[6789]\d{9}$/|unique:users,mobile,' . $request->post('id'),
            'email' => 'nullable|email|unique:users,email,' . $request->post('id'),
        ]);


        try {
            $user = User::findOrFail($request->id);
            $user->fullname = $request->fullname;
            $user->mobile = $request->mobile;
            $user->email = $request->email;

            if ($request->hasFile('profile')) {
                FileService::delete($user->profile);
                $user->profile = FileService::save($request->file('profile'));
            }

            $user->save();

            $msg = "Update Add Successfully !!";

            return redirect()->back()->with('success', $msg);
        } catch (\Exception $e) {
            // Handle the exception, you can log it or return a specific error response.
            $errorMsg = "An error occurred: " . $e->getMessage();
            return redirect()->back()->with('error', $errorMsg);
        }

    }

    public function changepassword($id)
    {
        // dd("Changing your password");
        return view('user.change_password', compact('id'));
    }

    public function changePasswordSubmit(Request $request){
        // dd($request->all());

        $this->validate($request, [
            'user_id' => 'required|numeric|exists:users,id',
            'new_password' => 'required|string|min:6',
        ]);

        $data = User::find($request->user_id);
        $data->password = Hash::make($request->new_password);
        $data->save();
        return response()->json(['status' => 200, 'message' => "Password Change Successfully"]);
    }
}
