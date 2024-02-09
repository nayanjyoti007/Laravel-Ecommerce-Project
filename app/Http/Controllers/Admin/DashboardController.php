<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function dashboard(){

        $usersToday = User::whereDate('created_at', Carbon::today())->count();
        $usersTotal = User::count();

        return view('admin.dashboard', compact('usersToday', 'usersTotal'));
    }
}
