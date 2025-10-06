<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Assuming the table is named 'course'
    protected $table = 'course'; 

    protected $primaryKey = 'course_id';
    
    // Disable timestamps for this model
    public $timestamps = false;
    
    // Add the fillable fields for mass assignment
    protected $fillable = [
        'course_name',
        'teacher_id',
        'Tenant_id',
    ];

    /**
     * Define the relationship to the Teacher model.
     * A Course belongs to one Teacher.
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'teacher_id');
    }
}