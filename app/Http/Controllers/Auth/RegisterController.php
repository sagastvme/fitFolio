<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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
            'weight' => ['required', 'integer', 'min:30', 'max:300'],
            'height' => ['required', 'integer', 'min:30', 'max:300'],
            'goal'=>[ ' in:Gain muscle,Loose fat,Stay fit'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $bmi = $this->calculateBMI( $data['height'], $data['weight']);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'initial_weight' => $data['weight'],
            'actual_weight' => $data['weight'],
            'initial_height' => $data['height'],
            'actual_height' => $data['height'],
            'initial_bmi'=> $bmi,
            'actual_bmi'=>$bmi,
            'goal'=>$data['goal'],
            'password' => Hash::make($data['password']),
        ]);
    }
    private function calculateBMI($height, $weight): float
    {
        $bmi = ($weight/$height/$height) * 10000;
        return round($bmi,0);

    }
}
