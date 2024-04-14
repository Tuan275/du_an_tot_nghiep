<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckAdmin;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.list', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function register()
    {
        return view('client.user.register');
    }

    public function store(Request $request)
    {
        $users = User::all();
        $formFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'image' => 'required|file|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->image;
            $file->move("uploads/users/", $file->getClientOriginalName());
        }
        $formFields['image'] = "uploads/users/" . $file->getClientOriginalName();

        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);

        // auth()->login($user);
        return redirect()->route('admin.user.list');
    }

    public function login_form()
    {
        return view('client.user.login');
    }


    public function login(Request $request)
    {
        $validateLogin = $request->validate(
            [
                'email' => 'required|exists:users,email',
                'password' => 'required',
            ]
        );
        if (Auth::attempt($validateLogin)) {
            if (Auth::user()->role == 1) {
                return redirect()->route('admin.user.list');
            }
            return redirect()->route('admin.user.list');
        }
        return redirect()->route('user.login_form')->with('message', 'Login failed');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('client.home');
    }
}
