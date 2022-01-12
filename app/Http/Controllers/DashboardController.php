<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }
    public function profile()
    {
        return view('admin.partials.admin-profile');
    }
}
