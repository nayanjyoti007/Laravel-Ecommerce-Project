<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function form()
    {
        $id = Auth::guard('admin')->user()->id;
        $data = Admin::findOrFail($id);
        return view('admin.profile', compact('data'));
    }

    public function submit(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'id' => 'required|numeric|exists:admins,id',
            'profile' => 'nullable|image|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:100',
            // 'mobile' => 'required|numeric|digits:10|regex:/^(\+91[\-\s]?)?[6789]\d{9}$/|unique:users,mobile,' . $request->post('id'),
            'email' => 'nullable|email|unique:admins,email,' . $request->post('id'),
        ]);


        try {
            $admin = Admin::findOrFail($request->id);
            $admin->name = $request->name;
            // $admin->mobile = $request->mobile;
            $admin->email = $request->email;

            if ($request->hasFile('profile')) {
                FileService::delete($admin->profile);
                $admin->profile = FileService::save($request->file('profile'));
            }

            $admin->save();

            $msg = "Admin Profile Update Successfully";

            $notification = array('message' => $msg, 'alert-type' => 'success');
            // return redirect()->back()->with('success', $msg);
            return redirect()->back()->with($notification);

        } catch (\Exception $e) {
            // Handle the exception, you can log it or return a specific error response.
            $errorMsg = "An error occurred: " . $e->getMessage();
            return redirect()->back()->with('error', $errorMsg);
        }

    }
}
