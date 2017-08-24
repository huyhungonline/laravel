<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function getListUser()
    {
      $users = User::all();
      return view('admin.user.danhsach',['users'=>$users]);
    }
    public function getAddUser()
    {
       return view('admin.user.them');
    }
    public function postAddUser(Request $req)
    {
      $this->validate($req,[
         'userName' => 'required|min:3',
         'email' => 'required|email|unique:users,email',
         'pass' => 'required|min:4|max:8',
         'rePass' => 'required|same:pass',
      ],[
          'userName.required' => 'Bạn chưa nhập tên người dùng',
          'email.required' => 'Bạn chưa nhập email',
          'pass.required' => 'Bạn chưa nhập tên password',
          'rePass.required' => 'Bạn chưa nhập lại password',
          'userName.min' => 'Tên người dùng tối thiểu 3 ký tự',
          'email.email' => 'Chưa nhập đúng định dạng email',
          'email.unique' => 'email đã tồn tại',
          'pass.min' => 'password tối thiểu 4 ký tự',
          'pass.max' => 'password tối đa 8 ký tự',
          'rePass.same' => 'rePassword nhập lại chưa đúng',
      ]);
      $user = new User;
      $user->name = $req->userName;
      $user->email = $req->email;
      $user->password = bcrypt($req->pass);
      $user->quyen = $req->level;
      $user->save();
      return redirect('admin/user/add_user')->with('mess','Add user successfully');
    }
    public function getEditUser($id)
    {
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }
    public function postEditUser(Request $req,$id)
    {
      $this->validate($req,[
         'userName' => 'required|min:3',
      ],[
          'userName.required' => 'Bạn chưa nhập tên người dùng',
          'userName.min' => 'Tên người dùng tối thiểu 3 ký tự',
      ]);
      $user = User::find($id);
      $user->name = $req->userName;
      $user->quyen = $req->level;

      if($req->changePass == 'on'){
          $this->validate($req,[
             'pass' => 'required|min:4|max:8',
             'rePass' => 'required|same:pass',
          ],[
              'pass.required' => 'Bạn chưa nhập tên password',
              'rePass.required' => 'Bạn chưa nhập lại password',
              'pass.min' => 'password tối thiểu 4 ký tự',
              'pass.max' => 'password tối đa 8 ký tự',
              'rePass.same' => 'rePassword nhập lại chưa đúng',
          ]);
          $user->password = bcrypt($req->pass);
      }
      if($req->changeEmail == 'on'){
          $this->validate($req,[
             'email' => 'required|email|unique:users,email',
          ],[
            'email.email' => 'Chưa nhập đúng định dạng email',
            'email.unique' => 'email đã tồn tại',
            'email.required' => 'Bạn chưa nhập email'
          ]);
          $user->email = $req->email;
      }
      $user->save();
      return redirect('admin/user/edit_user/'.$id)->with('mess','Edit user info successfully');
    }
    public function getDelete($id)
    {
          $user = User::find($id);
          $user->delete();
          return redirect('admin/user/list_user')->with('mess','Delete user successfully');

    }
    public function getloginAdmin()
    {
         return view('admin.login');
    }
    public function postloginAdmin(Request $req)
    {
         $this->validate($req,[
            'email' => 'required|email|',
            'pass' => 'required|min:4|max:8',

         ],[
            'email.required' => 'Bạn chưa nhập email',
            'pass.required' => 'Bạn chưa nhập tên password',
            'pass.min' => 'password tối thiểu 4 ký tự',
            'pass.max' => 'password tối đa 8 ký tự',
            'email.email' => 'Chưa nhập đúng định dạng email',
         ]);
         if (Auth::attempt(['email'=>$req->email,'password'=>$req->pass])) {
           //$users = User::all();
           return redirect('admin/user/list_user');
         } else{
           return redirect('admin/login');
         }
    }
    public function getlogoutAdmin()
    {
      Auth::logout();
      return redirect('admin/login');
    }
    public function getLogin()
    {
      return view('front_end.login');
    }
    public function postLogin(Request $req)
    {

      echo $req->email;
      echo $req->pass;
      $this->validate($req,[
         'email' => 'required|email|',
         'pass' => 'required|min:4|max:8',

      ],[
         'email.required' => 'Bạn chưa nhập email',
         'pass.required' => 'Bạn chưa nhập tên password',
         'pass.min' => 'password tối thiểu 4 ký tự',
         'pass.max' => 'password tối đa 8 ký tự',
         'email.email' => 'Chưa nhập đúng định dạng email',
      ]);
      if (Auth::attempt(['email'=>$req->email,'password'=>$req->pass])) {
        return redirect('home');
      } else{
        return redirect('login');
      }
    }
}
