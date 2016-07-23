<?php

namespace LTP\Http\Controllers\Auth;

use LTP\SocialAccount;
use LTP\User;
use Validator;
use LTP\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use Auth;
use Redirect;

class AuthController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $ghUser = Socialite::driver('github')->user();

        // if the social account exists and has
        $socialAccount = SocialAccount::where([
            'identifier' => $ghUser->getId(),
            'type' => 'github'
        ])->first();

        if ($socialAccount) {
            $user = User::find($socialAccount->user_id);
        } else {
            // create a new user
            $user = new User;
            $user->forceFill([
                'name' => $ghUser->getName(),
                'email' => $ghUser->getEmail()
            ]);
            $user->save();

            $socialAccount = new SocialAccount;
            $socialAccount->forceFill([
                'user_id' => $user->id,
                'username' => $ghUser->getNickname(),
                'type' => 'github',
                'identifier' => $ghUser->getId(),
                'name' => $ghUser->getName(),
                'email' => $ghUser->getEmail(),
                'avatar' => $ghUser->getAvatar()
            ]);
            $socialAccount->save();
        }

        Auth::login($user);

        return back();
    }
}
