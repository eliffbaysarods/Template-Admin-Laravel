<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('home.index');
    }


    public function aboutus()
    {
        return view('home.about');
    }

    public function login()
    {
        return view('admin.login');
    }
    public function logincheck(Request $request)
    {

        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('admin');
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match your records',
            ]);
        } else {
            return view('admin.login');
        } {
            return view('admin.login');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }




    public function test($id, $name)
    {

        return view('home.test', ['id' => $id, 'name' => $name]);

        /*
        echo "Id Number :",$id;
        echo "<br>Name :",$name;
        for($i=1;$i<=$id;$i++)
        {
            echo "<br> $i-$name";
        }
        */
    }
}
