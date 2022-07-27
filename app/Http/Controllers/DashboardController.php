<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(Auth::id())
        {
         if(Auth::user()->usertype=='1')
         {
            return view('admin.dashboard');
         }
         else
         {
            return redirect()->back();
         }
        }
        else
        {
            return redirect('login');
        }
    }
}
