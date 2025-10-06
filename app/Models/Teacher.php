<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
use HasFactory;
protected $table = 'teacher';
public $timestamps = false;

protected $primaryKey = 'teacher_id';
protected $fillable = [
        'Tenant_id',
        'first_name',
        'last_name',
        'Subject',
    ];
}