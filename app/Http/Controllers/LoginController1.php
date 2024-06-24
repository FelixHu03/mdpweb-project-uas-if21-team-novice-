<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use function Laravel\Prompts\password;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $messages = [
            'email.required' => 'Salah!',
            'password.required' => 'Salah!'
        ];
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ],[
            $messages
        ]);
        $infologin = [
            'email'=> $request->email,
            'password'=> $request->password,
        ];

        if (Auth::attempt($infologin)) {
            // kalo authentikasi sucses
            // $request->session()->regenerate();
            // return redirect()->intended('hotel.index');
            return redirect('hotel')->with('Succsess', 'Berhasil Login');
        } 
        else{
            // return 'gagal';
            return Redirect::back()->withErrors(
                [
                    'email' => 'Username or Password wrong!!'
                ]
            );
            // return redirect::back()->withErrors(['Username or Password Salah']);
            // return redirect('login')->withErrors('Username or Password Salah')->withInput();
        }
        // return back()->withErrors(['
        // email' => 'Email atau Password Salah'])->onlyInput('email');
    }// end contructor login
    public function logout(){
        Auth::logout();
        return redirect('login')->with('Success', 'Berhasil Logout');
    }
    public function index()
    {
        return view('login/index');
    }
    public function register(){
        return view('login/register');
    }
    public function create(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('name', $request->name);
        $val = $request -> validate([
            'email' =>'required|email|unique:users',
            'name' => 'required',
            'password' => 'required|min:6'
        ],[
            'name.required'=> 'name Wajib diisi!',
            'name.email'=> 'Silahkan Masukkan Email yang Valid!',
            'name.unique'=> 'Email Sudah ada!',
            'email.required'=> 'email Wajib diisi!',
            'password.required'=> 'password Wajib diisi!',
            'password.min'=> 'Minimum Password 6 katakter!'
        ]
    );
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'password'=> Hash::make($request->password)
    ];
    User::create($data);
    $infologin = [
        'email'=> $request->email,
        'password'=> $request->password,
    ];

    if (Auth::attempt($infologin)) {
        // kalo authentikasi sucses
        // $request->session()->regenerate();
        // return redirect()->intended('hotel.index');
        return redirect('login')->with('Succsess', Auth::user()->name.' Berhasil Login');
    } 
    else{
        // return 'gagal';
        return Redirect::back()->withErrors(
            [
                'email' => 'Username or Password wrong!!'
            ]
        );
    }
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login)
    {
        //
    }
}
