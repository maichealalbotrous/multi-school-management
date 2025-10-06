<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class courseController extends Controller
{
   public function index()
    {
        $tenantId = Auth::user()->tenant_id;
        $Authcourse = course::with('teacher')->where('Tenant_id', 1)->get();
        return view('pages.course.course', ['AuthCourse' => $Authcourse,'Teachers'=>Teacher::all()]);
    }

    public function store(Request $request)
    {
  $validatedData = $request->validate([
            'course_name' => 'required|string|max:50',
            'teacher_id' => 'required|integer|exists:teacher,teacher_id',
        ]);

        $validatedData['Tenant_id'] = 1;

        Course::create($validatedData);

        return Redirect::route('showCourse');
    }
   public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'course_name' => 'required|string|max:50',
            // Corrected the table name from 'teachers' to 'teacher'
            'teacher_id' => 'required|integer|exists:teacher,teacher_id',
        ]);

        // Find the course by its ID
        $course = Course::findOrFail($id); 

        // Update the course with validated data
        $course->update($validatedData);

        // Redirect back to the course list
        return Redirect::route('showCourse');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($course_id)
    {
        // Find the course by its ID
        $course = Course::findOrFail($course_id);
    
        // Delete the course
        $course->delete();

        // Redirect or return a success response
        return redirect()->back()->with('success', 'Course deleted successfully!');
    }
}