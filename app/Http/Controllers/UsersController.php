<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class UsersController extends Controller
{
    /**
     * [__construct description]
     */
    public function __construct()
    {
      $this->middleware('auth',[
        'except'=>['show','create','store','index'],
      ]);
      $this->middleware('guest',[
        'only'=>['create'],
      ]);
    }

    /**
     * [create 创建用户的页面]
     * @return [type] [description]
     */
    public function create()
    {
      return view('pages.user.create');
    }

    /**
     * [Users description]
     */
    public function index()
    {
      $users = User::paginate(10);
      return view('pages.user.index',compact('users'));
    }
  /**
   * [show 显示用户个人信息的页面]
   * @param  User   $user [description]
   * @return [type]       [description]
   */
    public function show(User $user)
    {
      return view('pages.user.show',compact('user'));
    }

    /**
     * [store 注册用户]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
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
  /**
   * [edit 编辑用户个人资料的页面]
   * @param  User   $user [description]
   * @return [type]       [description]
   */
    public function edit(User $user)
    {
      $this->authorize('update',$user);
      return view('pages.user.edit',compact('user'));
    }
  /**
   * [update 更新用户信息]
   * @param  User    $user    [description]
   * @param  Request $request [description]
   * @return [type]           [description]
   */
    public function update(User $user,Request $request)
    {
      $this->validate($request,[
        'name'=>'required|max:50',
        'password'=>'required|confirmed|min:6'
      ]);
      $this->authorize('update',$user);
      $data = array();
      $data['name'] = $request->name;
      if ($request->password){
        $data['password'] = bcrypt($request->passwrd);
      }
      $user->update($data);

      session()->flash('success', '个人资料更新成功!');
      return redirect()->route('pages.user.show', $user->id);
    }

    public function destroy(User $user)
    {
      $this->authorize('destroy',$user);
      $user->delete();
      session()->flash('success','成功删除用户!');
      return back();
    }
}
