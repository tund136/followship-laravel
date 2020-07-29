<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {
    public function register() {
        return view('home.register');
    }

    public function registerPost(Request $request) {
        $rules = ['name' => 'required|string|max:120', 'username' => 'required|string|max:120', 'password' => 'required|string|max:120|min:6', 'email' => 'required|email|max:120',];

        $messages = ['name.required' => 'This field is required.', 'name.string' => 'This field is invalid.', 'name.max' => 'This field is too long.',

            'username.required' => 'This field is required.', 'username.string' => 'This field is invalid.', 'username.max' => 'This field is too long.',

            'password.required' => 'This field is required.', 'password.string' => 'This field is invalid.', 'password.max' => 'This field is too long.', 'password.min' => 'Please enter a more secured password.',

            'email.required' => 'This field is required.', 'email.email' => 'Please enter a valid email address.', 'email.max' => 'This field is too long.'];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 422);
        } else {
            return "All good!";
        }
    }
}
