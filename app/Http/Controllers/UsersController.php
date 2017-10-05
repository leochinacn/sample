<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    //
    public function create()
    {
      return view('pages.user.create');
    }

    public function Users()
    {
      # code...
    }

    public function show(User $user)
    {
      return view('pages.user.show',compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        $user = User::create([
          'name'=>$request->name,
          'email'=>$request->email,
          'password'=>bcrypt($request->password)
        ]);
        if ($user){
          Auth::login($user);
          session()->flash('success','欢迎，您将在这里开启一段新的旅程~');
        }
        return redirect()->route('users.show',$user);
    }

    public function edit(User $user)
    {
      return view('pages.user.edit',compact('user'));
    }

    public function update(User $user,Request $request)
    {
      $this->validate($request,[
        'name'=>'required|max:50',
        'password'=>'required|confirmed|min:6'
      ]);
      $data = array();
      $data['name'] = $request->name;
      if ($request->password){
        $data['password'] = bcrypt($request->passwrd);
      }
      $user->update($data);

      session()->flash('success', '个人资料更新成功！');
      return redirect()->route('pages.user.show', $user->id);
    }
}
