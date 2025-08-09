<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Home()
    {
        $totalStudents = Student::count();
        $totalGroups = Group::count();
        return view('admin.index',compact('totalStudents','totalGroups'));
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Ви вийшли з аккаунту',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }
    public function Profile()
    {
         $id = Auth::user()->id;
         $adminData = User::find($id);
         return view('admin.admin_profile_view',compact('adminData'));
    }
    public function EditProfile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.edit_profile_view',compact('adminData'));
    }

    public function UpdateProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        if ($request->file('photo')) {
            $file=$request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] =  $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Провфіль оновлено',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.profile')->with($notification);
    }
    public function ChangePassword(){

        return view('admin.admin_change_password');

    }// End Method


    public function UpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','Пароль оновлено');
            return redirect()->back();
        } else{
            session()->flash('message','Старий пароль не вірний');
            return redirect()->back();
        }

    }// End Method
}
