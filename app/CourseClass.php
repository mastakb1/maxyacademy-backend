<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
    protected $table = 'course_class';

    public function user_create()
    {
        return $this->belongsTo('App\User', 'created_id', 'id');
    }

    public function user_update()
    {
        return $this->belongsTo('App\User', 'updated_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'id_course', 'id');
    }

    public function filter($order_field, $order_ascdesc, $search, $search_column, $limit, $startLimit, $id_course)
    {
        $sql = CourseClass::select('course_class.*', 'user_create.name as user_create_name', 'user_update.name as user_update_name')
        ->join('users as user_create', 'user_create.id', 'course_class.created_id')
        ->join('users as user_update', 'user_update.id', 'course_class.updated_id')
        ->where('course_class.id_course', $id_course)
        ->orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('course_class.id', 'LIKE', "%{$search}%")
            ->orWhere('course_class.batch', 'LIKE', "%{$search}%")
            ->orWhere('course_class.start_date', 'LIKE', "%{$search}%")
            ->orWhere('course_class.end_date', 'LIKE', "%{$search}%")
            ->orWhere('course_class.quota', 'LIKE', "%{$search}%")
            ->orWhere('course_class.status', 'LIKE', "%{$search}%")
            ->orWhere('course_class.created_at', 'LIKE', "%{$search}%")
            ->orWhere('user_create.name', 'LIKE', "%{$search}%")
            ->orWhere('course_class.updated_at', 'LIKE', "%{$search}%")
            ->orWhere('user_update.name', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('course_class.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['batch'] != '' && $search_column['batch'] != NULL) {
            $sql->where('course_class.batch', 'LIKE', "%{$search_column['batch']}%");
        }
        if ($search_column['start_date'] != '' && $search_column['start_date'] != NULL) {
            $sql->where('course_class.start_date', 'LIKE', "%{$search_column['start_date']}%");
        }
        if ($search_column['end_date'] != '' && $search_column['end_date'] != NULL) {
            $sql->where('course_class.end_date', 'LIKE', "%{$search_column['end_date']}%");
        }
        if ($search_column['quota'] != '' && $search_column['quota'] != NULL) {
            $sql->where('course_class.quota', 'LIKE', "%{$search_column['quota']}%");
        }
        if ($search_column['status'] != '' && $search_column['status'] != NULL) {
            $sql->where('course_class.status', 'LIKE', "%{$search_column['status']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('course_class.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }
        if ($search_column['user_create'] != '' && $search_column['user_create'] != NULL) {
            $sql->where('user_create.name', 'LIKE', "%{$search_column['user_create']}%");
        }
        if ($search_column['updated_at'] != '' && $search_column['updated_at'] != NULL) {
            $sql->where('course_class.updated_at', 'LIKE', "%{$search_column['updated_at']}%");
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
