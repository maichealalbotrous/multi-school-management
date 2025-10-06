<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enrollment', function (Blueprint $table) {
                                 $table->increments('enroll_id');
                  $table->integer('Tenant_id');
            $table->integer('student_id');
            $table->integer('course_id');
$table->timestamp('enrollment_date')->useCurrent(); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_enrollment');
    }
};