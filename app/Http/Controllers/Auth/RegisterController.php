<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
            /* Gender este un camp obligatoriu. */
            'gender' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        /**
         * getRoleId are rolul de a prelua id-ul pentru pacient. In cazul in care id-ul ar fi hardcodat, daca ulterior s-ar face 
         * odificari (stergeri, adaugari de roluri) role_id ar primi un id gresit.
        */
        $getRoleId = Role::where('name','patient')->first();
        return User::create([
            /**
             * Laravel a setat ca default name, email si password.
             */
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            /**
             * A trebuit sa setez in plus role_id si gender.
             */
            'role_id' => $getRoleId,
            'gender'=> $data['gender']
        ]);
    }
}
