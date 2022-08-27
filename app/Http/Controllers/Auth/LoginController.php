<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
    // Facebook Function to Log in
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Facebook Function to Log in
    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        $id = $socialUser->getId();
        $token = $socialUser->token;
        $refreshToken = $socialUser->refreshToken;
         $expiresIn = $socialUser->expiresIn;
        $nickName = $socialUser->getNickname();
        $name = $socialUser->getName();
        $email = $socialUser->getEmail() == '' ? trim(Str::lower(Str::replaceArray(' ', ['_'], $name))) . '@' . $provider . '.com' : $socialUser->getEmail();
        $user_image = $socialUser->getAvatar();

        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'first_name' => $name,
                'last_name' => $name,
                'username' => $nickName != '' ? $nickName : trim(Str::lower(Str::replaceArray(' ', ['_'], $name))),
                'email' => $email,
                'email_verified_at' => Carbon::now(),
                'phone' => null,
                'status' => 1,
                'receive_email' => 1,
                'remember_token' => $token,
                'password' => Hash::make($email),
            ]
        );

        $user->assignRole('user');

        Auth::login($user, true);

        return redirect()->route('home')->with([
            'message' => 'Your logged in successfully',
            'alert-type' => 'success',
        ]);
    }



}
