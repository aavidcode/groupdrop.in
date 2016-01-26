<?php

namespace App\Http\Controllers;

use App\Models;
use Input;

class UserController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Home Controller
      |--------------------------------------------------------------------------
      |
      | This controller renders your application's "dashboard" for users that
      | are authenticated. Of course, you are free to change or remove the
      | controller as you wish. It is just here to get your app started!
      |
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index() {
        return view('index');
    }

    public function activateUser($id, $activationCode) {
        $user = Models\User::find($id);
        if ($user && ($user->activation_code == $activationCode)) {
            $user->is_activate = true;
            $user->save();
            return redirect('')->with('status', 1);
        }
    }

    public function myCommunities() {
        $user_id = \Auth::user()->id;
        $user = Models\User::find($user_id);
        $polls = Models\PollsDemand::where('type', '=', 1)->get();
        $demands = Models\PollsDemand::where('type', '=', 2)->get();
        return view('home', compact('user', 'polls', 'demands'));
    }

    public function saveCommunities() {
        $user_id = \Auth::user()->id;
        $user = Models\User::find($user_id);
        $data = [];
        $user->userCommunities()->delete();
        foreach (Input::get('communities') as $comm_id) {
            $data[] = array(
                'community_id' => $comm_id,
                'user_id' => $user_id
            );
        }
        $user->userCommunities()->insert($data);
        return response()->json(['redirect' => 'my-communities']);
    }

}
