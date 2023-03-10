<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Shop;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

//    protected $redirectTo = '/dashboard';

    protected function redirectTo()
    {
        if (userConnect()->type == 'Owner') {
            return '/dashboard';
        }
        else {
            return '/';
        }
    }
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'typeUser' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'province_id' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'type' => $data['typeUser'],
            'email' => $data['email'],
            'province_id' => $data['province_id'],
            'password' => Hash::make($data['password']),
        ]);

        if($user->type == 'Owner'){
            Shop::create([
                'type' => 'FREE',
                'status' => 'ACTIVE',
                'user_id' => $user->id
            ]);
        }
        return $user;
    }
}
