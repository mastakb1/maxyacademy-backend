<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MDifficultyType extends Model
{
    protected $table = 'm_difficulty_type';

    public function user_create()
    {
        return $this->belongsTo('App\User', 'created_id', 'id');
    }

    public function user_update()
    {
        return $this->belongsTo('App\User', 'updated_id', 'id');
    }

    public function filter($order_field, $order_ascdesc, $search, $search_column, $limit, $startLimit)
    {
        $sql = MDifficultyType::select('m_difficulty_type.*', 'user_create.name as user_create_name', 'user_update.name as user_update_name')
        ->join('users as user_create', 'user_create.id', 'm_difficulty_type.created_id')
        ->join('users as user_update', 'user_update.id', 'm_difficulty_type.updated_id')
        ->orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('m_difficulty_type.id', 'LIKE', "%{$search}%")
            ->orWhere('m_difficulty_type.name', 'LIKE', "%{$search}%")
            ->orWhere('m_difficulty_type.description', 'LIKE', "%{$search}%")
            ->orWhere('m_difficulty_type.status', 'LIKE', "%{$search}%")
            ->orWhere('m_difficulty_type.created_at', 'LIKE', "%{$search}%")
            ->orWhere('user_create.name', 'LIKE', "%{$search}%")
            ->orWhere('m_difficulty_type.updated_at', 'LIKE', "%{$search}%")
            ->orWhere('user_update.name', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('m_difficulty_type.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['name'] != '' && $search_column['name'] != NULL) {
            $sql->where('m_difficulty_type.name', 'LIKE', "%{$search_column['name']}%");
        }
        if ($search_column['description'] != '' && $search_column['description'] != NULL) {
            $sql->where('m_difficulty_type.description', 'LIKE', "%{$search_column['description']}%");
        }
        if ($search_column['status'] != '' && $search_column['status'] != NULL) {
            $sql->where('m_difficulty_type.status', 'LIKE', "%{$search_column['status']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('m_difficulty_type.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }
        if ($search_column['user_create'] != '' && $search_column['user_create'] != NULL) {
            $sql->where('user_create.name', 'LIKE', "%{$search_column['user_create']}%");
        }
        if ($search_column['updated_at'] != '' && $search_column['updated_at'] != NULL) {
            $sql->where('m_difficulty_type.updated_at', 'LIKE', "%{$search_column['updated_at']}%");
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
