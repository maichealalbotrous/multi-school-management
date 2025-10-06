<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use Illuminate\Support\Facades\Redirect;

class TeacherController extends Controller
{
    public function index()
    {
        $tenantId = Auth::user()->tenant_id;
        
        $AuthTeachers = teacher::where('Tenant_id', 1)->get();

        return view('pages.teacher.teachers',['AuthTeachers'=>$AuthTeachers]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'Subject' => 'required|string|max:50',
    ]);

     $validate['Tenant_id'] = 1;
     teacher::create($validate);
     return Redirect::route('teachers');        
        
    }

    public function update(Request $request , $id)
    {
           $validate = $request->validate([
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'Subject' => 'required|string|max:50',
    ]);

    $teacher = teacher::findOrFail($id); 
     $teacher->update($validate);
     return Redirect::route('teachers');
     
    }

    public function destroy($Id)
    {
        $teacher = teacher::where('teacher_id',$Id);
        $teacher->delete();
        return Redirect::route('teachers');
    }
} 