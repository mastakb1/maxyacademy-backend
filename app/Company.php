<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    // tabel untuk data company & university, kedepannya untuk simpan data partner

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
        $sql = Company::select('company.*', 'user_create.name as user_create_name', 'user_update.name as user_update_name')
        ->join('users as user_create', 'user_create.id', 'company.created_id')
        ->join('users as user_update', 'user_update.id', 'company.updated_id')
        ->orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('company.id', 'LIKE', "%{$search}%")
            ->orWhere('company.name', 'LIKE', "%{$search}%")
            ->orWhere('company.type', 'LIKE', "%{$search}%")
            ->orWhere('company.url', 'LIKE', "%{$search}%")
            ->orWhere('company.description', 'LIKE', "%{$search}%")
            ->orWhere('company.address', 'LIKE', "%{$search}%")
            ->orWhere('company.phone', 'LIKE', "%{$search}%")
            ->orWhere('company.email', 'LIKE', "%{$search}%")
            ->orWhere('company.contact_person', 'LIKE', "%{$search}%")
            ->orWhere('company.status', 'LIKE', "%{$search}%")
            ->orWhere('company.status_highlight', 'LIKE', "%{$search}%")
            ->orWhere('company.created_at', 'LIKE', "%{$search}%")
            ->orWhere('user_create.name', 'LIKE', "%{$search}%")
            ->orWhere('company.updated_at', 'LIKE', "%{$search}%")
            ->orWhere('user_update.name', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('company.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['name'] != '' && $search_column['name'] != NULL) {
            $sql->where('company.name', 'LIKE', "%{$search_column['name']}%");
        }
        if ($search_column['type'] != '' && $search_column['type'] != NULL) {
            $sql->where('company.type', 'LIKE', "%{$search_column['type']}%");
        }
        if ($search_column['url'] != '' && $search_column['url'] != NULL) {
            $sql->where('company.url', 'LIKE', "%{$search_column['url']}%");
        }
        if ($search_column['description'] != '' && $search_column['description'] != NULL) {
            $sql->where('company.description', 'LIKE', "%{$search_column['description']}%");
        }
        if ($search_column['address'] != '' && $search_column['address'] != NULL) {
            $sql->where('company.address', 'LIKE', "%{$search_column['address']}%");
        }
        if ($search_column['phone'] != '' && $search_column['phone'] != NULL) {
            $sql->where('company.phone', 'LIKE', "%{$search_column['phone']}%");
        }
        if ($search_column['status'] != '' && $search_column['status'] != NULL) {
            $sql->where('company.status', 'LIKE', "%{$search_column['status']}%");
        }
        if ($search_column['status_highlight'] != '' && $search_column['status_highlight'] != NULL) {
            $sql->where('company.status_highlight', 'LIKE', "%{$search_column['status_highlight']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('company.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }
        if ($search_column['user_create'] != '' && $search_column['user_create'] != NULL) {
            $sql->where('user_create.name', 'LIKE', "%{$search_column['user_create']}%");
        }
        if ($search_column['updated_at'] != '' && $search_column['updated_at'] != NULL) {
            $sql->where('company.updated_at', 'LIKE', "%{$search_column['updated_at']}%");
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
