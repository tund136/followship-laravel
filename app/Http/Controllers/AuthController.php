<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {
    public function register() {
        return view('home.register');
    }

    public function registerPost(Request $request) {
        $rules = ['name' => 'required|string|max:120', 'username' => 'required|string|max:120|unique:users', 'password' => 'required|string|max:120|min:6', 'email' => 'required|email|max:120|unique:users'];

        $messages = ['name.required' => 'This field is required.', 'name.string' => 'This field is invalid.', 'name.max' => 'This field is too long.',

            'username.required' => 'This field is required.', 'username.string' => 'This field is invalid.', 'username.max' => 'This field is too long.',

            'password.required' => 'This field is required.', 'password.string' => 'This field is invalid.', 'password.max' => 'This field is too long.', 'password.min' => 'Please enter a more secured password.',

            'email.required' => 'This field is required.', 'email.email' => 'Please enter a valid email address.', 'email.max' => 'This field is too long.'];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        } else {
            $data = new User();
            $data->name = $request->name;
            $data->username = $request->username;
            $data->password = Hash::make($request->password);
            $data->email = $request->email;
            Session::flash('reg_success', 'Please login to continue!');
            $data->save();

            return response()->json(['success' => 'Account created successfully! Please do not leave the page which would automatically refresh.', 'redirect_link' => route('home')]);
        }
    }
}
