<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $tenant_Id = Auth::user()->tenant_id;
        $AuthStudent= Student::where('Tenant_id',1)->get()->count();
        $Authcourse= course::where('Tenant_id',1)->get()->count();        
        $AuthTeacher= Teacher::where('Tenant_id',1)->get()->count();        
        $AuthEnrollment= Enrollment::where('Tenant_id',1)->get()->count();       
        return view('dashboard',['AuthStudent'=>$AuthStudent,'Authcourse'=>$Authcourse,'AuthTeacher'=>$AuthTeacher,'AuthEnrollment'=>$AuthEnrollment]); 

    }

        

}