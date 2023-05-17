<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class partner extends Model
{
    protected $table = 'partner';
    // tabel untuk data partner & university, kedepannya untuk simpan data partner

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
        $sql = partner::select('partner.*', 'user_create.name as user_create_name', 'user_update.name as user_update_name')
        ->join('users as user_create', 'user_create.id', 'partner.created_id')
        ->join('users as user_update', 'user_update.id', 'partner.updated_id')
        ->orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('partner.id', 'LIKE', "%{$search}%")
            ->orWhere('partner.name', 'LIKE', "%{$search}%")
            ->orWhere('partner.type', 'LIKE', "%{$search}%")
            ->orWhere('partner.url', 'LIKE', "%{$search}%")
            ->orWhere('partner.description', 'LIKE', "%{$search}%")
            ->orWhere('partner.address', 'LIKE', "%{$search}%")
            ->orWhere('partner.phone', 'LIKE', "%{$search}%")
            ->orWhere('partner.email', 'LIKE', "%{$search}%")
            ->orWhere('partner.contact_person', 'LIKE', "%{$search}%")
            ->orWhere('partner.status', 'LIKE', "%{$search}%")
            ->orWhere('partner.status_highlight', 'LIKE', "%{$search}%")
            ->orWhere('partner.created_at', 'LIKE', "%{$search}%")
            ->orWhere('user_create.name', 'LIKE', "%{$search}%")
            ->orWhere('partner.updated_at', 'LIKE', "%{$search}%")
            ->orWhere('user_update.name', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('partner.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['name'] != '' && $search_column['name'] != NULL) {
            $sql->where('partner.name', 'LIKE', "%{$search_column['name']}%");
        }
        if ($search_column['type'] != '' && $search_column['type'] != NULL) {
            $sql->where('partner.type', 'LIKE', "%{$search_column['type']}%");
        }
        if ($search_column['url'] != '' && $search_column['url'] != NULL) {
            $sql->where('partner.url', 'LIKE', "%{$search_column['url']}%");
        }
        if ($search_column['description'] != '' && $search_column['description'] != NULL) {
            $sql->where('partner.description', 'LIKE', "%{$search_column['description']}%");
        }
        if ($search_column['address'] != '' && $search_column['address'] != NULL) {
            $sql->where('partner.address', 'LIKE', "%{$search_column['address']}%");
        }
        if ($search_column['phone'] != '' && $search_column['phone'] != NULL) {
            $sql->where('partner.phone', 'LIKE', "%{$search_column['phone']}%");
        }
        if ($search_column['status'] != '' && $search_column['status'] != NULL) {
            $sql->where('partner.status', 'LIKE', "%{$search_column['status']}%");
        }
        if ($search_column['status_highlight'] != '' && $search_column['status_highlight'] != NULL) {
            $sql->where('partner.status_highlight', 'LIKE', "%{$search_column['status_highlight']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('partner.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }
        if ($search_column['user_create'] != '' && $search_column['user_create'] != NULL) {
            $sql->where('user_create.name', 'LIKE', "%{$search_column['user_create']}%");
        }
        if ($search_column['updated_at'] != '' && $search_column['updated_at'] != NULL) {
            $sql->where('partner.updated_at', 'LIKE', "%{$search_column['updated_at']}%");
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
