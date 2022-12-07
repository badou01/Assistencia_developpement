<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
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
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';
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
            'prenom' => ['required', 'string', 'max:50'],
            'nom' => ['required', 'string', 'max:40'],
            'nom_utilisateur' => ['required', 'string','unique:users,nom_utilisateur', 'max:40'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo_identite'=>['mimes:jpg,png,jpeg,gif,svg'],
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
        if(request()->file('photo_identite')){
            $ext=request()->file('photo_identite')->getClientOriginalExtension();

        $path_img=request()->file('photo_identite')->storeAs('photo_identites',$data['prenom'].$data['nom'].'_'.uniqid().$ext);
        }
        else
            {
                $path_img=null;
            }
        return User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'nom_utilisateur' => $data['nom_utilisateur'],
            'email' => $data['email'],
            'photo_identite'=>$path_img,
            'password' => bcrypt($data['password']),

        ]);

    }
}
