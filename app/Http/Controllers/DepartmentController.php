<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Group;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function DepartmentView()
    {
        $data['allData'] = Department::all();
        return view('admin.department_view', $data);
    }//End Metod
    public function DepartmentViewOne($id)
    {
        $department = Department::with('groups')->findOrFail($id);
        return view('admin.group_st_view', compact('department'));
    }//End Metod
    public function DepartmentAdd()
    {
        return view('admin.department_add');
    }//End Metod

    public function DepartmentStore(Request $request)
    {
        $validateData=$request->validate([
            'name' => 'required|unique:departments',

        ]);

        $data =new Department();
        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'Відділення додано',
            'alert-type' => 'info'
        );
        return redirect()->route('department.view')->with($notification);

        }//End Metod

    public function DepartmentEdit($id)
    {
        $editData = Department::find($id);
        return view('admin.department_edit',compact('editData'));
    }//End Metod

    public function DepartmentUpdate(Request $request, $id)
    {

        $data =Department::find($id);
        $data->name = $request->name;


        $data->save();

        $notification = array(
            'message' => 'Відділення оновлено',
            'alert-type' => 'info'
        );
        return redirect()->route('department.view')->with($notification);

    }//End Metod

    public function DepartmentDelete($id)
    {
        $user = Department::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Відділення видалено',
            'alert-type' => 'info'
        );
        return redirect()->route('class.view')->with($notification);
    }//End Metod

}
