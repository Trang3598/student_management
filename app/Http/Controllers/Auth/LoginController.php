<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;

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
    protected $redirectTo = '/admin/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $user->provider = $provider;
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser);
        return redirect(route('user.index'));
    }

    private function findOrCreateUser($provider)
    {
        $authUser = User::where('provider_id', '=', $provider->id)->first();
        if ($authUser) {
            return $authUser;
        }
        if ($provider->email) {
            $authUser = User::where('email', $provider->email)->first();

            if ($authUser) {
                if ($authUser->provider_id != $provider->id) {
                    $authUser->update(['provider_id' => $provider->id, 'provider' => $provider->provider]);
                }
                return $authUser;
            }
        }
        if (empty($provider->email)) {
            $provider->email = sprintf('%s@gmail.com', $provider->id);
        }
        return User::create([
            'username' => $provider->name,
            'email' => $provider->email,
            'password' => $provider->id,
            'confirm' => '',
            'level' => 0,
            'provider_id' => $provider->id,
            'provider' => $provider->provider,
        ]);
    }
}
