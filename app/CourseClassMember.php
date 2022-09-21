<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseClassMember extends Model
{
    protected $table = 'course_class_member';

    public function course_class()
    {
        return $this->belongsTo('App\CourseClass', 'id_course_class', 'id');
    }
}
