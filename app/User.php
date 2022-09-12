<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function access_group()
    {
        return $this->belongsTo('App\AccessGroup', 'id_access_group', 'id'); 
    }

    public function filter($order_field, $order_ascdesc, $search, $search_column, $limit, $startLimit)
    {
        $sql = User::select('users.*', 'access_group.name as access_group')
            ->join('access_group', 'access_group.id', 'users.id_access_group')
            ->orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('users.id', 'LIKE', "%{$search}%")
            ->orWhere('users.name', 'LIKE', "%{$search}%")
            ->orWhere('users.email', 'LIKE', "%{$search}%")
            ->orWhere('users.created_at', 'LIKE', "%{$search}%")
            ->orWhere('users.updated_at', 'LIKE', "%{$search}%")
            ->orWhere('access_group.nama', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('users.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['name'] != '' && $search_column['name'] != NULL) {
            $sql->where('users.name', 'LIKE', "%{$search_column['name']}%");
        }
        if ($search_column['email'] != '' && $search_column['email'] != NULL) {
            $sql->where('users.email', 'LIKE', "%{$search_column['email']}%");
        }
        if ($search_column['access_group'] != '' && $search_column['access_group'] != NULL) {
            $sql->where('access_group.name', 'LIKE', "%{$search_column['access_group']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('users.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }
        if ($search_column['updated_at'] != '' && $search_column['updated_at'] != NULL) {
            $sql->where('users.updated_at', 'LIKE', "%{$search_column['updated_at']}%");
        }

        $filter_count = $sql->count();
        $filter_data = $sql->offset($startLimit)->limit($limit)->get();

        $data = ['filter_count' => $filter_count, 'filter_data' => $filter_data];
        return $data;
    }
}
