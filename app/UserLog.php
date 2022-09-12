<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = 'users_logs';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function filter($order_field, $order_ascdesc, $search, $search_column, $limit, $startLimit)
    {
        $sql = UserLog::select('users_logs.*', 'users.name as nama')
        ->join('users', 'users.id', 'users_logs.id_user')
        ->orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('users_logs.id', 'LIKE', "%{$search}%")
            ->orWhere('users.name', 'LIKE', "%{$search}%")
            ->orWhere('users_logs.ip', 'LIKE', "%{$search}%")
            ->orWhere('users_logs.keterangan', 'LIKE', "%{$search}%")
            ->orWhere('users_logs.created_at', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('users_logs.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['nama'] != '' && $search_column['nama'] != NULL) {
            $sql->where('users.name', 'LIKE', "%{$search_column['nama']}%");
        }
        if ($search_column['ip'] != '' && $search_column['ip'] != NULL) {
            $sql->where('users_logs.ip', 'LIKE', "%{$search_column['ip']}%");
        }
        if ($search_column['keterangan'] != '' && $search_column['keterangan'] != NULL) {
            $sql->where('users_logs.keterangan', 'LIKE', "%{$search_column['keterangan']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('users_logs.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }

        $filter_count = $sql->count();
        $filter_data = $sql->offset($startLimit)->limit($limit)->get();

        $data = ['filter_count' => $filter_count, 'filter_data' => $filter_data];
        return $data;
    }
}
