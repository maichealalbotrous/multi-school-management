<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
public $timestamps = false;

protected $primaryKey = 'student_id';
protected $fillable = [
        'Tenant_id',
        'first_name',
        'last_name',
        'grade',
    ];
}