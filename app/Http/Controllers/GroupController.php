<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Group;

use Illuminate\Http\Request;


class GroupController extends Controller
{
    public function GroupView()
    {
        $groups = Group::with('department')->get();

        return view('admin.group_view', compact('groups') );
    }//End Metod

    public function GroupAdd()
    {
        $departments = Department::all();
        return view('admin.group_add', compact('departments'));
    }//End Metod

    public function GroupStore(Request $request)
    {
        $validateData=$request->validate([
            'name' => 'required|unique:groups',
            'department_id' => 'required|exists:departments,id',
        ]);

        $data =new Group();
        $data->name = $request->name;
        $data->department_id = $request->department_id;
        $data->save();

        $notification = array(
            'message' => 'Групу додано',
            'alert-type' => 'info'
        );
        return redirect()->route('group.view')->with($notification);

    }//End Metod

       public function GroupEdit($id)
       {
           $editData = Group::find($id);
           $departments = Department::all();
           return view('admin.group_edit',compact('editData','departments'));
       }//End Metod

    public function GroupUpdate(Request $request, $id)
    {

        $data =Group::find($id);
        $data->name = $request->name;


        $data->save();

        $notification = array(
            'message' => 'Групу оновлено',
            'alert-type' => 'info'
        );
        return redirect()->route('group.view')->with($notification);

        }//End Metod

    public function GroupDelete($id)
    {
        $user = Group::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Групу видалено',
            'alert-type' => 'info'
        );
        return redirect()->route('group.view')->with($notification);
    }//End Metod

}
