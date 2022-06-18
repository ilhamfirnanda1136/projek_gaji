<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use File;

use function PHPUnit\Framework\returnSelf;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('profile',[
            'user' => $user,
        ]);
    }

    protected static function validator(array $data,$user) 
    {
        return Validator::make($data,array(
            'name'=>'required|string',
            'email'=>['required','email',Rule::unique('users')->ignore($user->id)],
            'confirm_password'=>'same:password'
          ));
    }
    
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $validator = self::validator($request->all(),$user);
        if($validator->fails()) return response()->json(['errors'=>$validator->errors()]);
        if($request->password ) {
            if(!Hash::check($request->current_password, $user->password)) {
                $error = ['current_password'=>['The provided password does not match your current password.']];
                return response()->json(['errors'=>$error]);
            }
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];
        if($request->password) {
            $data['password'] = Hash::make($request['password']);
        }
        if ($request->has('foto')) {
            file::delete('img/user/'.$user->foto);
            $file=$request->file('foto');
            $nama_file='user-'.date('Y').'-'.substr(md5(rand()),0,6).$file->getClientOriginalName();
            $data['foto']=$nama_file;
            $request->file('foto')->move('img/user/',$nama_file);
        }
        $user->forceFill($data)->save();
        $message = "successfull update user and password";
        return response()->json(['success'=>$request->all(),'message'=>$message], 200);
    }
}
