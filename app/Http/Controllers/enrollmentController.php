<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class enrollmentController extends Controller
{
    public function index()
    {
        $tenantId = Auth::user()->tenant_id;

        $Authenrollment = enrollment::where('Tenant_id', 1)
            ->with(['student', 'course']) 
            ->get();
        
        $Students = Student::where('Tenant_id', 1)->get(['student_id', 'first_name', 'last_name']);
        $Courses = Course::where('Tenant_id', 1)->get(['course_id', 'course_name']);

        return view('pages.enrollment.enrollment', [
            'Authenrollment' => $Authenrollment,
            'Students' => $Students, // Pass students under the key 'Students'
            'Courses' => $Courses   // Pass courses under the key 'Courses'
        ]);
        
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|integer',
            'course_id' => 'required|integer',
            'enrollment_date' => 'required|date'
        ]);

        // Use the authenticated user's tenant_id, not hardcoded '1'
        $validatedData['Tenant_id'] = 1;

        enrollment::create($validatedData);

        return Redirect::route('showenrollment')->with('success', 'Enrollment created successfully!');
    }
    
    public function update(Request $request, $id)
    { 
        
        $validatedData = $request->validate([
            'student_id' => 'required|integer',
            'course_id' => 'required|integer',
            'enrollment_date' => 'required|date'
        ]);
        
        $enrollment = enrollment::findOrFail($id); 

    
        $enrollment->update($validatedData);

        return Redirect::route('showenrollment')->with('success', 'Enrollment updated successfully!');
    }


    public function destroy($enrollment_id)
    {
        $enrollment = enrollment::findOrFail($enrollment_id);
    
     

        $enrollment->delete();

        return redirect()->back()->with('success', 'Enrollment deleted successfully!');
    }
}