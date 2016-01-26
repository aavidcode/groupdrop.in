<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\Auth;
use Mail;

trait AuthenticatesAndRegistersUsers {

    /**
     * The Guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * The registrar implementation.
     *
     * @var \Illuminate\Contracts\Auth\Registrar
     */
    protected $registrar;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister() {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request) {

//        $validator = $this->registrar->validator($request->all());
//
//        if ($validator->fails()) {
//            $this->throwValidationException(
//                    $request, $validator
//            );
//        }

        $this->auth->login($this->registrar->create($request->all()));

        $user = \App\Models\User::find($this->auth->user()->id);
        $activationCode = $user->getActivationCode();
        $activationURL = route('users.activate', ['id' => $user->id, 'activationCode' => $activationCode]);

        Mail::send('emails.auth.activate', ['user' => $user, 'activationURL' => $activationURL], function($message) use ($user) {
            $message->to($user->email, $user->first_name . ' ' . $user->last_name)->subject("Please confirm your email");
        });

        if ($request->ajax()) {
            return response()->json([
                        'accessGranted' => true,
                        'is_activate' => false
            ]);
        } else {
            return redirect($this->redirectPath());
        }
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin() {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember'))) {
            $user = \App\Models\User::find($this->auth->user()->id);
            $comm_count = $user->userCommunities()->count();
            return response()->json([
                        'accessGranted' => true,
                        'is_activate' => $this->auth->user()->is_activate,
                        'is_community' => ($comm_count > 0) ? true : false
            ]);
        }

        if ($request->ajax()) {
            return response()->json([
                        'accessGranted' => false,
                        'error' => $this->getFailedLoginMessage()
            ]);
        } else {
            return redirect($this->loginPath())
                            ->withInput($request->only('email', 'remember'))
                            ->withErrors([
                                'email' => $this->getFailedLoginMessage(),
            ]);
        }
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage() {
        return 'These credentials do not match our records.';
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout() {
        $this->auth->logout();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath() {
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/my-communities';
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath() {
        return '/';
    }

}
