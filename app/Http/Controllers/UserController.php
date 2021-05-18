<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Modal
use App\Models\User;

class UserController extends Controller
{

    public function login(Request $input)
    {
        
        $email      = $input->input('email');
        $password   = $input->input('password');

        $user = User::where('email', $email)->first();

        if(Hash::check($password, $user->password)){
            $apiToken = base64_encode(Str::random(40));

            $user->update([
                'remember_token' => $apiToken
            ]);

            return response()->json([
                'success'   => true,
                'message'   => "Berhasil Login",
                'data'      => [
                    'user'  => $user,
                    'token' => $apiToken,
                ]
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => "Tidak Bisa login. Silakan cek kembali Email dan Password",
                'data'      => ''
            ]);
        }

    }

    public function register(Request $input)
    {
        
        $name       = $input->input('name');
        $email      = $input->input('email');
        $noTelp     = $input->input('noTelp');
        $pass       = Hash::make($input->input('password'));

        $register               = New User;
        $register->name         = $name;
        $register->email        = $email;
        $register->noTelfon     = $noTelp;
        $register->password     = $pass;
        
        if($register->save()){
            return response()->json([
                'status'    => true,
                'message'   => 'Register Success',
            ], 201);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Register Failed',
            ], 400);
        }
    }

}
