<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{

	use SoftDeletes;

    // students

    // protected $table = "university_students";

    // default primary -> exist , one col , id

    // protected $primaryKey = "student_id";
}



// Teacher -> teachers
// StudentProfile -> student_profiles
// StudentFinanceProfile -> student_finance_profiles


/*

SQL table: students (id, name, birth_date, nationality, created_at, updated_at)
created_at, updated_at -> allowed to be null, timestamp

Y-m-d H:i:s

*/

/*

deleted_at -> timestamp, null
when delete row, deleted_at = current timestamp

*/