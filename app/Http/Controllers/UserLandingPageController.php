<?php

namespace App\Http\Controllers;

use App\Homestay;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserLandingPageController extends Controller
{
    //

    public function index(){
        return view('auth1.register');
    }

    public function store(UserRequest $request) {
        $input = $request -> all();
        if(trim($request->password)=='') {
            $input = $request->except('password');
        } else {
            $input = $request-> all();
            $input['password'] = bcrypt($request->password);
            $input['password'] = Hash::make($input['password']);
        }
        $input['password'] = bcrypt($request->password);

        if($file = $request->file('photo')){


            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $input['photo'] = $name;
        }




        User::create($input);
        return view('auth1.login');
    }
}
