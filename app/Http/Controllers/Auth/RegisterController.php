<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Monitor;
// use App\Models\User;
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
            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:monitors'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'first_name'=> ['required'], ['string'], ['max:70'],
            'last_name'=> ['required'], ['string'], ['max:70'],
            'phone'=> ['required'], ['string'], ['unique:monitors'], ['max:11'],
            'alt_phone'=> ['max:11'],
            'email'=> ['required'], ['string'], ['email'], ['max:40'], ['unique:monitors'],
            'gender'=> ['required'], 
            'dob'=> ['required']['date'],  
            'origin'=> ['required'],
            'lga_origin'=> ['required'],
            'residence'=> ['required'],
            'lga_residence'=> ['required'],
            'marital_status'=> ['required'],
            'type'=> ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Monitor
     */
    protected function create(array $data)
    {
        return Monitor::create([
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            'phone'=> $data['phone'],
            'alt_phone'=> $data['alt_phone'],
            'email'=> $data['email'],
            'gender'=> $data['gender'], 
            'dob'=> $data['dob'],  
            'origin'=> $data['origin'],
            'lga_origin'=> $data['lga_origin'],
            'residence'=>$data['residence'],
            'lga_residence'=> $data['lga_residence'],
            'marital_status'=> $data['marital_status'],
            'type'=> $data['type'],
        ]);
    }
}
