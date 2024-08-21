<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;


class UserController extends Controller
{
    public function login(){
        return view('login');
    }

    public function postLogin(Request $req){
        $credentials = $req->validate([
            'email' => 'required|email|exists:users,email',
            'password'  => 'required'
        ]);
        $user = Sentinel::authenticate($credentials);
        if($user){
            return redirect()->route('dashboard');
        }else{
            echo 'Đăng nhập thất bại';
        }
    }


    public function postRegister(Request $req){
        $credentials = $req->validate([
            'email' => 'required|email|unique:users,email',
            'password'  => 'required'
        ]);

        Sentinel::registerAndActivate($credentials);
        return back()->with([
            'message' => 'Đăng ký thành công'
        ]);
    }





    public function dashboard(){
        return view('dashboard');
    }
    public function logout(){
        Sentinel::logout();
        return redirect()->route('login');
    }


    public function createRole(){
        /// Tạo role mới
        // => create role user

        // $role = Sentinel::getRoleRepository()->createModel()->create([
        //     'name' => 'Super Admin',
        //     'slug' => 'super-admin',
        // ]);

        // Gán role cho user
        // $user = Sentinel::getUser();
        // $role = Sentinel::findRoleByName('User');
        // $role->users()->attach($user);

        // Bỏ role
        // $user = Sentinel::getUser();
        // $role = Sentinel::findRoleByName('User');
        // $role->users()->detach($user);

        // View
        // $user = Sentinel::getUser();
        // $role = Sentinel::findRoleByName('Super Admin');
        // if($user->inRole($role)){
        //     echo 'Được quyền xóa';
        // }
    }
}