<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/apartement');
        } else {
            return view('auth.login');
        }
    }

    public function postLogin(Request $request)
    {
        try {

            $data = [
                'username' => $request->input('username'),
                'password' => $request->input('password')
            ];

            if (Auth::attempt($data)) {
                $user = DB::table('users')->where('username', $request->username)->first();
                return redirect('/apartement')->with($request->session()->put([
                    'name' => $user->name,
                    'email' => $user->email,
                    'is_login' => 1
                ]));
            } else {
                return redirect('login')->with('error', 'Oops Email atau Password salah');
            }
        } catch (Exception $e) {
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'username' => 'required|unique:users,username,except,id',
                'email' => 'required|email|unique:users,email,except,id',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password'
            ],
            [
                'name.required' => 'Nama harus diisi',
                'username.required' => 'Username harus diisi',
                'username.unique' => 'Username sudah ada',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password harus diisi',
                'password.min' => 'Minimal password 8 karakter',
                'confirm_password.required' => 'Konfirmasi Password harus diisi',
                'confirm_password.same' => 'Konfirmasi password tidak sesuai'
            ]
        );


        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username
        ];


        try {
            $regis = DB::table('users')->insert($data);
            if ($regis) {
                return redirect('/login')->with('error', 'Silahkan login terlebih dahulu');
            } else {
                return redirect('/registrasi');
            }
        } catch (Exception $e) {
            Alert::info('Oops', $e);
            return redirect('/register');
        }
    }
}
