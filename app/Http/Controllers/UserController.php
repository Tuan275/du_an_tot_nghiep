<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckAdmin;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(3);

        return view('admin.user.list', compact('users'))->with('i', (request()->input('page',1) -1) *5);
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

    //sửa - xóa
    public function edit($id) {
        $user = User::find($id);
        return view('admin.user.edit', ['user'=> $user]);
    }

    public function update(Request $request) {
        $formFields = $request->validate([
            'name'=> 'required',
            'image'=> 'required|file|mimes:jpg,jpeg,png',
            'password'=> 'required',
            'email'=> 'required',
            'id'=>'required',

        ]);

        // dd($formFields);
        $user = User::find($formFields['id']);

        // dd($request->image);
        if($request->hasFile('image')) {
            $file = $formFields['image'];
            $filename = $file->getClientOriginalName();
            $path = 'uploads/user/';
            $file->move($path, $filename);
            $user->image = $path . $filename;
        }
        
        
        $user->name_service = $formFields['name_service'];
        $user->email = $formFields['email'];
        $user->password = $formFields['password'];
        $user->created_at = Carbon::now();


        $user->save();
        return redirect()->route('admin.user.list');
    }


    public function delete($id) {
        User::where('id', $id)->delete();
        return redirect('admin/user/list')->with('message', 'Delete user successfully');
    }
}
