<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Group;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function StudentView()
    {
        $departments = Department::with('groups.students')->get();
        return view('admin.students_all_view', compact('departments'));
    }//End Metod
    public function StudentGrView($id)
    {
        $group = Group::with('students')->findOrFail($id);
        return view('admin.students_gr_view', compact('group'));
    }//End Metod
    public function StudentViewOne($id)
    {
        $editData = Student::find($id);
        return view('admin.student_view',compact('editData'));
    }

    public function StudentAdd()
    {
        $groups = Department::all();
        return view('admin.student_add', compact('groups'));
    }//End Metod
    public function StudentStore(Request $request)
    {
        $validateData=$request->validate([

            'email' => 'required|unique:students',

        ]);

        $data =new User();
        $data->name = $request->name;
        $data->username = $request->username;
        $data->usertype = $request->usertype;
        if ($request->file('photo')) {
            $file=$request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] =  $filename;
        }
        $data->email  = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();

        $notification = array(
            'message' => 'Користувача додано',
            'alert-type' => 'info'
        );
        return redirect()->route('student.view')->with($notification);;

    }//End Metod
    public function StudentEdit($id)
    {

        $groups = Group::all();
        $editData = Student::find($id);
        return view('admin.student_edit',compact('editData', 'groups'));
    }//End Metod

    public function StudentUpdate(Request $request, $id)
    {

        $data =User::find($id);
        $data->name = $request->name;

        $data->usertype = $request->usertype;
        if ($request->file('photo')) {
            $file=$request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] =  $filename;
        }
        $data->email  = $request->email;

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
