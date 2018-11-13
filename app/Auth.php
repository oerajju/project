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
            if (Hash::check($password, $user->password_hash)) {
                session([
                    'userid' => $user->id,
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