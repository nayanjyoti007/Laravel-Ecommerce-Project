<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SlugGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ZipArchive;

class IndexController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginSubmit(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $userCredential = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($userCredential)) {
            // dd("ppp");
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('error', 'Username & Password Incorrect');
        }
    }

    public function logout(Request $request)
    {
        // $request->session()->flush();
        // Auth::logout();

        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect('/admin/login');
    }

    public function slug(Request $request)
    {
        // dd($request->all());
        $data = $request->get('data') ?? '';
        return SlugGenerator::generateSlug($data);
    }


    public function backupImages()
    {
        $folderPath = public_path('backend_images');
        // dd($folderPath);

        if (!is_dir($folderPath)) {
            return response()->json(['error' => 'Directory not found.']);
        }

        $zipFilePath = storage_path('app/public/backend_images_backup.zip');

        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($folderPath));

            foreach ($files as $file) {
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = str_replace($folderPath, '', $filePath);
                    $zip->addFile($filePath, $relativePath);
                }
            }

            $zip->close();

            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return response()->json(['error' => 'Unable to create backup.']);
        }
    }
}
