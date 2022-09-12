<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFailedAttempt extends Model
{
    protected $table = 'users_failed_attempts';
    public $timestamps = false;

    public function filter($order_field, $order_ascdesc, $search, $search_column, $limit, $startLimit)
    {
        $sql = UserFailedAttempt::select('users_failed_attempts.*')
        ->orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('users_failed_attempts.id', 'LIKE', "%{$search}%")
            ->orWhere('users_failed_attempts.email', 'LIKE', "%{$search}%")
            ->orWhere('users_failed_attempts.ip', 'LIKE', "%{$search}%")
            ->orWhere('users_failed_attempts.created_at', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('users_failed_attempts.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['email'] != '' && $search_column['email'] != NULL) {
            $sql->where('users_failed_attempts.email', 'LIKE', "%{$search_column['email']}%");
        }
        if ($search_column['ip'] != '' && $search_column['ip'] != NULL) {
            $sql->where('users_failed_attempts.ip', 'LIKE', "%{$search_column['ip']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('users_failed_attempts.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }

        $filter_count = $sql->count();
        $filter_data = $sql->offset($startLimit)->limit($limit)->get();

        $data = ['filter_count' => $filter_count, 'filter_data' => $filter_data];
        return $data;
    }
}
