<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Models\CustomUser;
use App\Models\Customer;

class CustomAuthController extends Controller
{
    public function login(){
        return view('auth.customlogin');
    }

    public function registration(){
        return view('auth.customregister');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'username' => [
                'required',
                Rule::exists('customers', 'used_access')->where(function ($query) use ($request) {
                    $query->where('used_access', $request->username);
            }),
            ],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:10',
        ]);

        $customUser = new CustomUser();
        $customUser->username = $request->username;
        $customUser->email = $request->email;
        $customUser->password = Hash::make($request->password);
        $res = $customUser->save();

        if ($res) {
            return back()->with('success', 'You have registered successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'username' =>'required',
            'password' => 'required|min:5|max:10',
        ]);

        $customUser = CustomUser::where('username','=',$request->username)->first();
        if($customUser) {
            if(Hash::check($request->password,$customUser->password)){
                $request->session()->put('loginId', $customUser->id);
                if($customUser->access=='admin'){
                    return redirect('admin');
                }elseif($customUser->access=='operation'){
                    return redirect('operation');
                }else{
                    return redirect('customer');
                };
            }else{
                return back()->with('fail','Password not matches.');
            };
        }else{
            return back()->with('fail','This username is not registered.');
        }
    }

}


