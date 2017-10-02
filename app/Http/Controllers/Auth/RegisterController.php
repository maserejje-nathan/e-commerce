<?php

namespace App\Http\Controllers\Auth;

use App\socialProvider;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Socialite;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *php
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        //dd($data);exit;
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function redirectToProvider($provider)
    {
        return Socialite::driver('$provider')->redirect();
    }


    public function handleProviderCallback()
    {


        try{

            $Socialuser = Socialite::driver('$provider')->user();

        }
        catch (\Exception $e){


            return redirect('/');

        }
        $socialprovider = socialProvider::where('provider_id','=',$Socialuser->getId())->first();

        if (!$socialprovider){

            //create new user

            $user = User::firstOrCreate(
              ['email'=> $Socialuser->getEmail()],
              ['name'=> $Socialuser->getName()]

            );

            $user->socialproviders()->create(
                ['provider_id'=>$Socialuser->getId(), 'provider'=>'facebook','avatar'=>$Socialuser->getAvatar()]
            );


        }
        else{

            //return existing user

            $user = $socialprovider->user;
        }

        auth()->login($user);

        return redirect('/');
    }

}
