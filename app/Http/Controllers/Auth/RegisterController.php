<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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


    protected function redirectTo(){
        $user = Auth::user();
        if($user->is_admin)
        return route('home');
        else{
                  session()->flash('success', 'Вы успешно зарегистрированы!');
                return route('index');
            }
    }
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;

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
         $rules=[
            'name' => ['required', 'string', 'max:255', 'min:4'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
             'city'=> ['required'],
             'phone'=> ['required'],
             'street'=> ['required'],
             'mail_index'=> ['required'],

        ];
       $messages= [
            'required' => 'Это поле обязательно для ввода',
            'min' => 'Это поле  должно иметь минимум :min символов',
            'email'=>'Почта составлена некорректно',
            'unique'=>'Такая почта уже используется',
            'confirmed'=>'Пароли должны совпадать'
        ];
        return Validator::make($data,$rules,$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
   public function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'street' => $data['street'],
            'city' => $data['city'],
            'mail_index' => $data['mail_index'],
        ]);
    }

}
