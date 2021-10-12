<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\PostBlogger;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
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
           
            'phone' => ['required'],
           
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

        $blogger = new PostBlogger();
        $blogger->bloger_name = $data['name'];
        $blogger->bloger_email = $data["email"];
        $blogger->bloger_phone = $data["phone"];
        $blogger->save();

        $usr = new User();
        $usr->name  = $data['name'];
        $usr->email  = $data['email'];
        $usr->password  = Hash::make($data['password']);
        $usr->relation_id  = $blogger->id;
        $usr->role  = "BLOGGER";
        $usr->is_active  = "A";
        $usr->phone  = $data["phone"];
       
        $usr->save();

        return $usr;
    }

    public function showRegistrationForm()
    {
        
        
        return view('auth.register');
    }
}
