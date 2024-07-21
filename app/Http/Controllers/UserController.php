<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckAdmin;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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

    public function update(Request $request,$id) {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        if ($request->hasFile('image')) {
            $file = $request['image'];
            $filename = $file->getClientOriginalName();
            $path = 'uploads/user/';
            $file->move($path, $filename);
             $path . $filename;
            $user->image = $path . $filename;;
        }
    
        $user->save();
    
        return redirect()->route('admin.user.list')->with('success', 'User updated successfully.');

    }

    public function update_role(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->role = $request->role;
        }
        $user->save();
        return redirect()->route('admin.user.list');
    }


    public function delete($id) {
        User::where('id', $id)->delete();
        return redirect('admin/user/list')->with('message', 'Delete user successfully');
    }




    

    //   // Google
    //   public function redirectToGoogle()
    //   {
    //       return Socialite::driver('google')->redirect();
    //   }
  
    //   public function handleGoogleCallback()
    //   {
    //       $user = Socialite::driver('google')->stateless()->user();
    //       $this->loginOrCreateAccount($user, 'google');
    //       return redirect()->intended('/home');
    //   }
  
    //   // Facebook
    //   public function redirectToFacebook()
    //   {
    //       return Socialite::driver('facebook')->redirect();
    //   }
  
    //   public function handleFacebookCallback()
    //   {
    //       $user = Socialite::driver('facebook')->stateless()->user();
    //       $this->loginOrCreateAccount($user, 'facebook');
    //       return redirect()->intended('/home');
    //   }
  
    //   // Helper function
    //   protected function loginOrCreateAccount($providerUser, $provider)
    //   {
    //       $user = User::where('provider_id', $providerUser->getId())->first();
  
    //       if (!$user) {
    //           $user = User::create([
    //               'name' => $providerUser->getName(),
    //               'email' => $providerUser->getEmail(),
    //               'provider' => $provider,
    //               'provider_id' => $providerUser->getId(),
    //               'password' => '',
    //           ]);
    //       }
  
    //       Auth::login($user, true);
    //   }
  
}
