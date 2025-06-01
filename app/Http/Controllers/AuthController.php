<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
        /**
     * Show the registration form
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-zA-Z]/',      
                'regex:/[0-9]/',         
                'regex:/[^a-zA-Z0-9]/',  
            ],
            'confirm_password' => 'required|same:password',
        ], [
            'name.required' => 'Name is required.',
            'name.min' => 'Name must be at least 2 characters long.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must contain at least one letter, one number, and one special character.',
            'confirm_password.required' => 'Please confirm your password.',
            'confirm_password.same' => 'Passwords do not match.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'confirm_password'));
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('auth.login')->with('success', 'Register Success, Please login to continue'); 

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'An error occurred while creating your account. Please try again.')
                ->withInput($request->except('password', 'confirm_password'));
        }
    }

    /**
     * Handle user login
     */
    public function login(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Password is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }

        // Prepare credentials
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        // Attempt to log the user in
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Get the authenticated user
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/dashboard')->with('success');
            } elseif ($user->role === 'guest') {
                return redirect('/home')->with('success');}
        }

        // Authentication failed
        return redirect()->back()
            ->with('error', 'Invalid email or password. Please try again.')
            ->withInput($request->only('email'));
    }

    /**
     * Handle user logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }

}
