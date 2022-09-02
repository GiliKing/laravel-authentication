<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // go to the landing page
    public function index() {
        return view('components.index');
    }

    // go to registration
    public function register() {
        return view('components.register');
    }

    // register the user
    public function store(Request $request) {
        $formFields = $request->validate([
            "name" => ['required', 'min:3'],
            "phone" => ['required', 'max:11'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['activate'] = 0;

        // dd()

        // create users
        $user = User::create($formFields);

        // check for activation
        if($user->activate == 0) {
            
            return redirect('/')->with('message', 'User created succesfully but you can only login after the admin has verified you ');

        } else {
            // login
            auth()->login($user);

            return redirect('/')->with('message', 'User created and logged in');
        }
    }

    // Logout user
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have being Log out');
    }

    // show login form
    public function login() {
        return view('components.login');
    }

    // authenticate user
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);        

        
        if($formFields['email'] == 'admin@gmail.com') {

            if(auth()->attempt($formFields)) {

                $request->session()->regenerate();
    
                return redirect('/admin')->with('message', 'You are now login');
    
            } else {

                return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
            }

        } else {

            if(auth()->attempt($formFields)) {

                $datas = User::where('email', $formFields['email'])->get();
    
                foreach($datas as $data) {
                    if($data->activate == 0) {
    
                        auth()->logout();
    
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
    
                        return redirect('/')->with('message', 'Your account is registered but it has not being activated please contact the Admin');
    
                    } else {
    
                        $request->session()->regenerate();
    
                        return redirect('/')->with('message', 'You are now login');
                    }
                }
    
    
            } else {
                return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
            }
        }

    }

    // admin controllers

    // show login form for admin
    public function adminLogin() {
        return view('admin.login');
    }

    // Logout user
    public function AdminLogout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login')->with('message', 'You have being Log out');
    }

    // authenticate admin
    public function adminAuthenticate(Request $request) {
        $formFields = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);

        if($formFields['email'] == "admin@gmail.com") {
            
            if(auth()->attempt($formFields)) { 

                $request->session()->regenerate();

                return redirect('/admin')->with('message', 'You are now login');
            } else {

                return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');

            }

        } else {

            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');

        }
    }

    // go to the landing page
    public function adminindex() {
        return view('admin.admin', [
            "users" => User::latest()->filter(request(['activate']))->simplepaginate()
        ]);
    }

    // go to the landing page
    public function adminindexpag() {
        return view('admin.admin', [
            "users" => User::latest()->filter(request(['activate']))->simplepaginate(5)
        ]);
    }

    // for double loging
    public function page() {
        return "An Account is already login in";
    }

    // view to activate user
    public function edit(User $user) {
        return view("admin.edit", [
            'user' => $user
        ]);
    }

    // for acivation
    public function activate(Request $request, User $user) {

        $formFields = $request->validate([
            "name" => 'required',
            "phone" => 'required',
            "email" => 'required',
            "password" => 'required',
            'activate' => 'required|min:1|max:1'
        ]);

        $user->update($formFields);

        return redirect('/admin')->with('message', 'Done Successfully!');

    }
}
