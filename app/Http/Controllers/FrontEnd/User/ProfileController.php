<?php

namespace App\Http\Controllers\FrontEnd\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.userPanel.profile', compact('user'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'id' => 'required|numeric|exists:users,id',
            'profile' => 'nullable|image|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:100',
            'mobile' => 'required|numeric|digits:10|regex:/^(\+91[\-\s]?)?[6789]\d{9}$/|unique:users,mobile,' . $request->post('id'),
            'email' => 'nullable|email|unique:users,email,' . $request->post('id'),
        ]);


        try {
            $user = User::findOrFail($request->id);
            $user->fullname = $request->name;
            $user->mobile = $request->mobile;
            $user->email = $request->email;

            if ($request->hasFile('profile')) {
                FileService::delete($user->profile);
                $user->profile = FileService::save($request->file('profile'));
            }

            if($user->save()){
            $msg = "Update Add Successfully !!";
            $notification = array('message' => $msg, 'alert-type' => 'success');
            return redirect()->route('user.dashboard')->with($notification);
            }else{
                dd('Failed to update Add Successfully');
            }



        } catch (\Exception $e) {
            // Handle the exception, you can log it or return a specific error response.
            $errorMsg = "An error occurred: " . $e->getMessage();
            return redirect()->back()->with('error', $errorMsg);
        }

    }

    public function changePassword(Request $request){
        if ($request->isMethod('GET')) {
            return view('frontend.userPanel.changePassword');
        }else{
            // dd($request->all());
        $this->validate($request, [

            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:6', 'same:confirm_password'],
        ]);


        $user = User::where('id', Auth::guard('web')->user()->id)->first();

        if (Hash::check($request->input('current_password'), $user->password)) {
            User::where('id', Auth::guard('web')->user()->id)->update([
                'password' => Hash::make($request->input('new_password')),
            ]);

            $msg = "Password Changed Successfully";
            $notification = array('message' => $msg, 'alert-type' => 'success');
            return redirect()->route('user.dashboard')->with($notification);

        } else {
            $msg = "Sorry Current Password Does Not Correct";
            $notification = array('message' => $msg, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
        }
    }
}
