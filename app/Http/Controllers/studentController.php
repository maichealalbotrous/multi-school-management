<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class studentController extends Controller
{
    public function index()
    {
        $tenantId = Auth::user()->tenant_id;
        $AuthStudent = Student::where('Tenant_id', 1)->get();
        return view('pages.student.student', ['AuthStudent' => $AuthStudent]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'grade' => 'required|string|max:50',
        ]);
        $validate['Tenant_id'] = 1;
        Student::create($validate);
        return Redirect::route('showStudent');
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'grade' => 'required|string|max:50',
        ]);
        $student = Student::findOrFail($id);
        $student->update($validate);
        return Redirect::route('showStudent');
    }

    public function destroy($Id)
    {
        $student = Student::where('student_id', $Id);
        $student->delete();
        return Redirect::route('showStudent');
    }
}