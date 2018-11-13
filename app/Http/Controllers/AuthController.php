<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use DB;
use Hash;
use Validator;
use Illuminate\Http\Response;

class AuthController extends Controller {

    public function index() {
        return view('login');
    }

    public function login(Request $r) {
        $auth = new Auth();
        $username = $r->input('username');
        $password = $r->input('password');
        $status = $auth->login($username, $password);
        if ($status === -1) {
            return response()->json($this->errorMessage(t_message('User may not exist or not activated yet.')), 500);
        } elseif ($status === true) {
            return response()->json($this->successMessage(t_message('Login Successful.')));
        } else {
            return response()->json($this->errorMessage(t_message('Invalid username or password')), 500);
        }
    }

    public function logout() {
        $auth = new Auth();
        $auth->logOut();
        return response()->json($this->successMessage(t_message('Logged Out Successfully.')));
    }

    // public function resetAdminPassword(Request $request) {
    //     $rules = [
    //         'user-id' => 'required',
    //         'password' => 'required|confirmed'
    //     ];
    //     $vld = Validator::make($request->all(), $rules);
    //     if ($vld->fails()) {
    //         return response()->json($this->errorMessage($vld->errors()), 500);
    //     } else {
    //         $userId = $request->input('user-id');
    //         $password = $request->input('password');
    //         $hashedPass = Hash::make($password);
    //         $user = \App\Users::find($userId);
    //         $user->password = $hashedPass;
    //         $user->save();
    //         return response()->json($this->successMessage(t_message('Password successfully changed.')));
    //     }
    // }

    // public function resetEmpPassword(Request $request) {
    //     $rules = [
    //         'user-id' => 'required',
    //         'password' => 'required|confirmed'
    //     ];
    //     $vld = Validator::make($request->all(), $rules);
    //     if ($vld->fails()) {
    //         return response()->json($this->errorMessage($vld->errors()), 500);
    //     } else {
    //         $userId = $request->input('user-id');
    //         $password = $request->input('password');
    //         $hashedPass = Hash::make($password);
    //         $user = \App\Employee::find($userId);
    //         $user->password_hash = $hashedPass;
    //         $user->save();
    //         return response()->json($this->successMessage(t_message('Password successfully changed.')));
    //     }
    // }

    // public function changeAdminPassword(Request $request) {
    //     $rules = [
    //         'old-password' => 'required',
    //         'password' => 'required|confirmed'
    //     ];
    //     $vld = Validator::make($request->all(), $rules);
    //     if ($vld->fails()) {
    //         return response()->json($this->errorMessage($vld->errors()), 500);
    //     } else {
    //         $userId = session('userid');
    //         $password = $request->input('password');
    //         $oldPass = $request->input('old-password');
    //         $user = \App\Users::find($userId);
    //         if (Hash::check($oldPass, $user->password)) {
    //             $hashedPass = Hash::make($password);
    //             $user->password = $hashedPass;
    //             $user->save();
    //             return response()->json($this->successMessage(t_message('Password successfully changed.')));
    //         } else {
    //             return response()->json($this->errorMessage(t_message('Incorrect old password.')), 500);
    //         }
    //     }
    // }

    // public function changeEmpPassword(Request $request) {
    //     $rules = [
    //         'old-password' => 'required',
    //         'password' => 'required|confirmed'
    //     ];
    //     $vld = Validator::make($request->all(), $rules);
    //     if ($vld->fails()) {
    //         return response()->json($this->errorMessage($vld->errors()), 500);
    //     } else {
    //         $drb = (new \App\Darbandi())->getGeneralInfo(session('darbandiid_exec'));
    //         $userId = $drb->empid;
    //         $password = $request->input('password');
    //         $oldPass = $request->input('old-password');
    //         $user = \App\Employee::find($userId);
    //         if (Hash::check($oldPass, $user->password_hash)) {
    //             $hashedPass = Hash::make($password);
    //             $user->password_hash = $hashedPass;
    //             $user->save();
    //             return response()->json($this->successMessage(t_message('Password successfully changed.')));
    //         } else {
    //             return response()->json($this->errorMessage(t_message('Incorrect old password.')), 500);
    //         }
    //     }
    // }

    // public function profile() {
    //     if ((!empty(session('usertype')) && session('usertype') == 'admin')) {
    //         $uid = session('userid');
    //         $user = \App\Users::find($uid);
    //         return view('auth.profile_admin', ['user' => $user]);
    //     } else {
    //         $drb = (new \App\Darbandi())->getGeneralInfo(session('darbandiid_exec'));
    //         $userId = $drb->empid;
    //         $user = \App\Employee::find($userId);
    //         return view('auth.profile', ['user' => $user]);
    //     }
    // }
}
