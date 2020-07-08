<?php

namespace App\Http\Controllers\dashboard;

use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class changepassController extends Controller
{
    public function index()
    {
        return view('dashboard/profile/changepass');
    }

    public function store(Request $request)
    {
        if (Auth::Check()) {
            $request->validate([
                'current-password' => 'required',
                'password' => 'required|same:password|min:8',
                'password_confirmation' => 'required|same:password|min:8'
            ]);

            $current_password = Auth::User()->password;
            if (Hash::check($request['current-password'], $current_password)) {
                $user_id = Auth::User()->id;
                $obj_user = User::find($user_id);
                $obj_user->password = Hash::make($request['password']);;
                $obj_user->save();
                return redirect()->to('/dash/auth/changepass')->with('status', 'Password has been changed!');
            } else {
                return redirect()->to('/dash/auth/changepass')->with('status', 'Wrong current Password!');
            }
        }
    }
}
