<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Auth\SessionGuard as SessionGuard;
use Illuminate\Http\Request as _Request ;
use Auth;

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
    protected $redirectTo = '/';


    private $guard = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->guard = Auth::guard();
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(_Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $guardName = 'web';
        if($request->admin == 'dc179d240785f696cb36662613545ce8')
            $guardName = 'web_admins';

        try{
            $guard = Auth::guard($guardName);
        } catch (\Exception $exception){
            $guard = null;
        }

        if (!is_null($guard) && $this->attemptLogin($request , $guard)) {
            $this->redirectTo = route('Main:GetUserPage', ['userGUID' => Auth::user()->id]);
            return $this->sendLoginResponse($request, $guard);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function attemptLogin(_Request $request,SessionGuard $guard = null)
    {
        $guard = is_null($guard) ? $this->guard : $guard;
        return $guard->attempt(
            $this->credentials($request), $request->has('remember')
        );
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected function sendLoginResponse(_Request $request,SessionGuard $guard = null)
    {
        $guard = is_null($guard) ? $this->guard : $guard;

        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $guard->user())
            ?: redirect()->intended($this->redirectPath());
    }

}
