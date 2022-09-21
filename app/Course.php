<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';

    public function user_create()
    {
        return $this->belongsTo('App\User', 'created_id', 'id');
    }

    public function user_update()
    {
        return $this->belongsTo('App\User', 'updated_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo('App\MCourseType', 'id_m_course_type', 'id');
    }

    public function difficulty()
    {
        return $this->belongsTo('App\MDifficultyType', 'id_m_difficulty_type', 'id');
    }

    public function tutors()
    {
        return $this->belongsToMany('App\MTutor', 'course_tutor', 'id_course', 'id_m_tutor');
    }

    public function filter($order_field, $order_ascdesc, $search, $search_column, $limit, $startLimit)
    {
        $sql = Course::select('course.*', 'user_create.name as user_create_name', 'user_update.name as user_update_name', 'm_course_type.name as course_type', 'm_difficulty_type.name as difficulty')
        ->join('users as user_create', 'user_create.id', 'course.created_id')
        ->join('users as user_update', 'user_update.id', 'course.updated_id')
        ->join('m_course_type', 'm_course_type.id', 'course.id_m_course_type')
        ->join('m_difficulty_type', 'm_difficulty_type.id', 'course.id_m_difficulty_type')
        ->orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('course.id', 'LIKE', "%{$search}%")
            ->orWhere('course.name', 'LIKE', "%{$search}%")
            ->orWhere('course.description', 'LIKE', "%{$search}%")
            ->orWhere('m_course_type.name', 'LIKE', "%{$search}%")
            ->orWhere('m_difficulty_type.name', 'LIKE', "%{$search}%")
            ->orWhere('course.status', 'LIKE', "%{$search}%")
            ->orWhere('course.created_at', 'LIKE', "%{$search}%")
            ->orWhere('user_create.name', 'LIKE', "%{$search}%")
            ->orWhere('course.updated_at', 'LIKE', "%{$search}%")
            ->orWhere('user_update.name', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('course.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['name'] != '' && $search_column['name'] != NULL) {
            $sql->where('course.name', 'LIKE', "%{$search_column['name']}%");
        }
        if ($search_column['description'] != '' && $search_column['description'] != NULL) {
            $sql->where('course.description', 'LIKE', "%{$search_column['description']}%");
        }
        if ($search_column['course_type'] != '' && $search_column['course_type'] != NULL) {
            $sql->where('m_course_type.name', 'LIKE', "%{$search_column['course_type']}%");
        }
        if ($search_column['difficulty'] != '' && $search_column['difficulty'] != NULL) {
            $sql->where('m_difficulty_type.name', 'LIKE', "%{$search_column['difficulty']}%");
        }
        if ($search_column['status'] != '' && $search_column['status'] != NULL) {
            $sql->where('course.status', 'LIKE', "%{$search_column['status']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('course.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }
        if ($search_column['user_create'] != '' && $search_column['user_create'] != NULL) {
            $sql->where('user_create.name', 'LIKE', "%{$search_column['user_create']}%");
        }
        if ($search_column['updated_at'] != '' && $search_column['updated_at'] != NULL) {
            $sql->where('course.updated_at', 'LIKE', "%{$search_column['updated_at']}%");
        }
        if ($search_column['user_update'] != '' && $search_column['user_update'] != NULL) {
            $sql->where('user_update.name', 'LIKE', "%{$search_column['user_update']}%");
        }

        $filter_count = $sql->count();
        $filter_data = $sql->offset($startLimit)->limit($limit)->get();

        $data = ['filter_count' => $filter_count, 'filter_data' => $filter_data];
        return $data;
    }
}
