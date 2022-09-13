<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderCourse extends Model
{
    protected $table = 'order_course';

    public function user_create()
    {
        return $this->belongsTo('App\User', 'created_id', 'id');
    }

    public function user_update()
    {
        return $this->belongsTo('App\User', 'updated_id', 'id');
    }

    public function user_forced()
    {
        return $this->belongsTo('App\User', 'forced_id', 'id');
    }

    public function member()
    {
        return $this->belongsTo('App\Member', 'id_member', 'id');
    }

    public function package()
    {
        return $this->belongsTo('App\MPackage', 'id_m_package', 'id');
    }

    public function course()
    {
        return $this->belongsTo('App\MCourse', 'id_m_course', 'id');
    }

    public function filter($order_field, $order_ascdesc, $search, $search_column, $limit, $startLimit)
    {
        $sql = OrderCourse::select('order_course.*', 'user_create.name as user_create_name','user_update.name as user_update_name', 'user_forced.name as user_forced_name', 'member.name as member', 'm_package.name as package', 'm_discount.name as discount')
        ->join('users as user_create', 'user_create.id', 'order_course.created_id')
        ->join('users as user_update', 'user_update.id', 'order_course.updated_id')
        ->leftJoin('users as user_forced', 'user_forced.id', 'order_course.forced_id')
        ->join('member', 'member.id', 'order_course.id_member')
        ->join('m_package', 'm_package.id', 'order_course.id_m_package')
        ->leftJoin('m_discount', 'm_discount.id', 'order_course.id_m_discount')
        ->orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('order_course.id', 'LIKE', "%{$search}%")
            ->orWhere('order_course.order_number', 'LIKE', "%{$search}%")
            ->orWhere('order_course.date', 'LIKE', "%{$search}%")
            ->orWhere('member.name', 'LIKE', "%{$search}%")
            ->orWhere('m_package.name', 'LIKE', "%{$search}%")
            ->orWhere('m_discount.name', 'LIKE', "%{$search}%")
            ->orWhere('order_course.total_price', 'LIKE', "%{$search}%")
            ->orWhere('order_course.status', 'LIKE', "%{$search}%")
            ->orWhere('order_course.forced_at', 'LIKE', "%{$search}%")
            ->orWhere('order_course.forced_comment', 'LIKE', "%{$search}%")
            ->orWhere('user_forced.name', 'LIKE', "%{$search}%")
            ->orWhere('order_course.created_at', 'LIKE', "%{$search}%")
            ->orWhere('user_create.name', 'LIKE', "%{$search}%")
            ->orWhere('order_course.updated_at', 'LIKE', "%{$search}%")
            ->orWhere('user_update.name', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('order_course.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['order_number'] != '' && $search_column['order_number'] != NULL) {
            $sql->where('order_course.order_number', 'LIKE', "%{$search_column['order_number']}%");
        }
        if ($search_column['date'] != '' && $search_column['date'] != NULL) {
            $sql->where('order_course.date', 'LIKE', "%{$search_column['date']}%");
        }
        if ($search_column['member'] != '' && $search_column['member'] != NULL) {
            $sql->where('member.name', 'LIKE', "%{$search_column['member']}%");
        }
        if ($search_column['package'] != '' && $search_column['package'] != NULL) {
            $sql->where('m_package.name', 'LIKE', "%{$search_column['package']}%");
        }
        if ($search_column['discount'] != '' && $search_column['discount'] != NULL) {
            $sql->where('m_discount.name', 'LIKE', "%{$search_column['discount']}%");
        }
        if ($search_column['total_price'] != '' && $search_column['total_price'] != NULL) {
            $sql->where('order_course.total_price', 'LIKE', "%{$search_column['total_price']}%");
        }
        if ($search_column['status'] != '' && $search_column['status'] != NULL) {
            $sql->where('order_course.status', 'LIKE', "%{$search_column['status']}%");
        }
        if ($search_column['forced_at'] != '' && $search_column['forced_at'] != NULL) {
            $sql->where('order_course.forced_at', 'LIKE', "%{$search_column['forced_at']}%");
        }
        if ($search_column['user_forced'] != '' && $search_column['user_forced'] != NULL) {
            $sql->where('user_forced.name', 'LIKE', "%{$search_column['user_forced']}%");
        }
        if ($search_column['forced_comment'] != '' && $search_column['forced_comment'] != NULL) {
            $sql->where('order_course.forced_comment', 'LIKE', "%{$search_column['forced_comment']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('order_course.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }
        if ($search_column['user_create'] != '' && $search_column['user_create'] != NULL) {
            $sql->where('user_create.name', 'LIKE', "%{$search_column['user_create']}%");
        }
        if ($search_column['updated_at'] != '' && $search_column['updated_at'] != NULL) {
            $sql->where('order_course.updated_at', 'LIKE', "%{$search_column['updated_at']}%");
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
