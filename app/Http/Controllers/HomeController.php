<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $is_login = $request->session()->has('is_login');
        if ($is_login != 1) {
            return redirect('/login');
        }
        return view('welcome');
    }
}
