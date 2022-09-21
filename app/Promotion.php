<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotion';

    public function user_create()
    {
        return $this->belongsTo('App\User', 'created_id', 'id');
    }

    public function user_update()
    {
        return $this->belongsTo('App\User', 'updated_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany('App\TransOrder', 'id_promotion', 'id')->with('member');
    }

    public function filter($order_field, $order_ascdesc, $search, $search_column, $limit, $startLimit)
    {
        $sql = Promotion::select('promotion.*', 'user_create.name as user_create_name', 'user_update.name as user_update_name')
        ->join('users as user_create', 'user_create.id', 'promotion.created_id')
        ->join('users as user_update', 'user_update.id', 'promotion.updated_id')
        ->orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('promotion.id', 'LIKE', "%{$search}%")
            ->orWhere('promotion.name', 'LIKE', "%{$search}%")
            ->orWhere('promotion.code', 'LIKE', "%{$search}%")
            ->orWhere('promotion.description', 'LIKE', "%{$search}%")
            ->orWhere('promotion.start_date', 'LIKE', "%{$search}%")
            ->orWhere('promotion.end_date', 'LIKE', "%{$search}%")
            ->orWhere('promotion.discount_type', 'LIKE', "%{$search}%")
            ->orWhere('promotion.discount', 'LIKE', "%{$search}%")
            ->orWhere('promotion.max_discount', 'LIKE', "%{$search}%")
            ->orWhere('promotion.status', 'LIKE', "%{$search}%")
            ->orWhere('promotion.created_at', 'LIKE', "%{$search}%")
            ->orWhere('user_create.name', 'LIKE', "%{$search}%")
            ->orWhere('promotion.updated_at', 'LIKE', "%{$search}%")
            ->orWhere('user_update.name', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('promotion.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['name'] != '' && $search_column['name'] != NULL) {
            $sql->where('promotion.name', 'LIKE', "%{$search_column['name']}%");
        }
        if ($search_column['code'] != '' && $search_column['code'] != NULL) {
            $sql->where('promotion.code', 'LIKE', "%{$search_column['code']}%");
        }
        if ($search_column['description'] != '' && $search_column['description'] != NULL) {
            $sql->where('promotion.description', 'LIKE', "%{$search_column['description']}%");
        }
        if ($search_column['start_date'] != '' && $search_column['start_date'] != NULL) {
            $sql->where('promotion.start_date', 'LIKE', "%{$search_column['start_date']}%");
        }
        if ($search_column['end_date'] != '' && $search_column['end_date'] != NULL) {
            $sql->where('promotion.end_date', 'LIKE', "%{$search_column['end_date']}%");
        }
        if ($search_column['discount_type'] != '' && $search_column['discount_type'] != NULL) {
            $sql->where('promotion.discount_type', 'LIKE', "%{$search_column['discount_type']}%");
        }
        if ($search_column['discount'] != '' && $search_column['discount'] != NULL) {
            $sql->where('promotion.discount', 'LIKE', "%{$search_column['discount']}%");
        }
        if ($search_column['max_discount'] != '' && $search_column['max_discount'] != NULL) {
            $sql->where('promotion.max_discount', 'LIKE', "%{$search_column['max_discount']}%");
        }
        if ($search_column['status'] != '' && $search_column['status'] != NULL) {
            $sql->where('promotion.status', 'LIKE', "%{$search_column['status']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('promotion.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }
        if ($search_column['user_create'] != '' && $search_column['user_create'] != NULL) {
            $sql->where('user_create.name', 'LIKE', "%{$search_column['user_create']}%");
        }
        if ($search_column['updated_at'] != '' && $search_column['updated_at'] != NULL) {
            $sql->where('promotion.updated_at', 'LIKE', "%{$search_column['updated_at']}%");
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
