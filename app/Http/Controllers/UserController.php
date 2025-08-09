<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function UserView()
    {
        $data['allData'] = User::all();
        return view('admin.user_view', $data);
    }//End Metod
    public function UserAdd()
    {
        $roles = Role::all();
        return view('admin.user_add',compact('roles'));
    }//End Metod
    public function UserStore(Request $request)
    {
        $validateData=$request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $data =new User();
        $data->name = $request->name;
        $data->username = $request->username;

        if ($request->file('photo')) {
            $file=$request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] =  $filename;
        }
        $data->email  = $request->email;
        $data->password = Hash::make($request->password);

        $data->assignRole($request->role);
        $data->save();
        $notification = array(
            'message' => 'Користувача додано',
            'alert-type' => 'info'
        );
        return redirect()->route('user.view')->with($notification);;

    }//End Metod
    public function UserEdit($id)
    {
        $editData = User::find($id);
        $rols = Role::all();
        return view('admin.user_edit',compact('editData', 'rols'));
    }//End Metod

    public function UserUpdate(Request $request, $id)
    {

        $data =User::find($id);
        $data->name = $request->name;

        if ($request->file('photo')) {
            $file=$request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] =  $filename;
        }
        $data->email  = $request->email;

        $data->syncRoles($request->role);
        $data->save();

        $notification = array(
            'message' => 'Користувача оновлено',
            'alert-type' => 'info'
        );
        return redirect()->route('user.view')->with($notification);

    }//End Metod

    public function UserDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Користувача видалено',
            'alert-type' => 'info'
        );
        return redirect()->route('user.view')->with($notification);
    }//End Metod
}
