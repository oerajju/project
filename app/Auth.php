<?php

namespace App;

use DB;
use Hash;
use Session;

class Auth {

    public function login($username, $password) {
        $user = DB::table('users')
                ->where('username', '=', $username)
                ->first();
        if (!empty($user)) {
            if (Hash::check($password, $user->password)) {
                session([
                    'logged_in' =>  true,
                    'userid' => $user->userid,
                    'user-type' =>$user->usertypeid,
                ]);
                return true;
            } else {
                return false;
            }
        } 
            return -1;
    }

    public function logout() {
        Session::flush();
    }
}