<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransOrder extends Model
{
    protected $table = 'trans_order';

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

    public function course_price()
    {
        return $this->belongsTo('App\CoursePrice', 'id_course_price', 'id');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'id_course', 'id');
    }

    public function promotion()
    {
        return $this->belongsTo('App\Promotion', 'id_promotion', 'id');
    }

    public function filter($order_field, $order_ascdesc, $search, $search_column, $limit, $startLimit)
    {
        $sql = TransOrder::select('trans_order.*', 'user_create.name as user_create_name','user_update.name as user_update_name', 'user_forced.name as user_forced_name', 'member.name as member', 'course_price.name as course_price', 'promotion.name as promotion')
        ->join('users as user_create', 'user_create.id', 'trans_order.created_id')
        ->join('users as user_update', 'user_update.id', 'trans_order.updated_id')
        ->leftJoin('users as user_forced', 'user_forced.id', 'trans_order.forced_id')
        ->join('member', 'member.id', 'trans_order.id_member')
        ->leftJoin('course_price', 'course_price.id', 'trans_order.id_course_price')
        ->leftJoin('promotion', 'promotion.id', 'trans_order.id_promotion')
        ->orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('trans_order.id', 'LIKE', "%{$search}%")
            ->orWhere('trans_order.order_number', 'LIKE', "%{$search}%")
            ->orWhere('trans_order.date', 'LIKE', "%{$search}%")
            ->orWhere('member.name', 'LIKE', "%{$search}%")
            ->orWhere('course_price.name', 'LIKE', "%{$search}%")
            ->orWhere('promotion.name', 'LIKE', "%{$search}%")
            ->orWhere('trans_order.total', 'LIKE', "%{$search}%")
            ->orWhere('trans_order.discount', 'LIKE', "%{$search}%")
            ->orWhere('trans_order.total_after_discount', 'LIKE', "%{$search}%")
            ->orWhere('trans_order.status', 'LIKE', "%{$search}%")
            ->orWhere('trans_order.forced_at', 'LIKE', "%{$search}%")
            ->orWhere('trans_order.forced_comment', 'LIKE', "%{$search}%")
            ->orWhere('user_forced.name', 'LIKE', "%{$search}%")
            ->orWhere('trans_order.created_at', 'LIKE', "%{$search}%")
            ->orWhere('user_create.name', 'LIKE', "%{$search}%")
            ->orWhere('trans_order.updated_at', 'LIKE', "%{$search}%")
            ->orWhere('user_update.name', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('trans_order.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['order_number'] != '' && $search_column['order_number'] != NULL) {
            $sql->where('trans_order.order_number', 'LIKE', "%{$search_column['order_number']}%");
        }
        if ($search_column['date'] != '' && $search_column['date'] != NULL) {
            $sql->where('trans_order.date', 'LIKE', "%{$search_column['date']}%");
        }
        if ($search_column['member'] != '' && $search_column['member'] != NULL) {
            $sql->where('member.name', 'LIKE', "%{$search_column['member']}%");
        }
        if ($search_column['course_price'] != '' && $search_column['course_price'] != NULL) {
            $sql->where('course_price.name', 'LIKE', "%{$search_column['course_price']}%");
        }
        if ($search_column['promotion'] != '' && $search_column['promotion'] != NULL) {
            $sql->where('promotion.name', 'LIKE', "%{$search_column['promotion']}%");
        }
        if ($search_column['total'] != '' && $search_column['total'] != NULL) {
            $sql->where('trans_order.total', 'LIKE', "%{$search_column['total']}%");
        }
        if ($search_column['discount'] != '' && $search_column['discount'] != NULL) {
            $sql->where('trans_order.discount', 'LIKE', "%{$search_column['discount']}%");
        }
        if ($search_column['total_after_discount'] != '' && $search_column['total_after_discount'] != NULL) {
            $sql->where('trans_order.total_after_discount', 'LIKE', "%{$search_column['total_after_discount']}%");
        }
        if ($search_column['status'] != '' && $search_column['status'] != NULL) {
            $sql->where('trans_order.status', 'LIKE', "%{$search_column['status']}%");
        }
        if ($search_column['forced_at'] != '' && $search_column['forced_at'] != NULL) {
            $sql->where('trans_order.forced_at', 'LIKE', "%{$search_column['forced_at']}%");
        }
        if ($search_column['user_forced'] != '' && $search_column['user_forced'] != NULL) {
            $sql->where('user_forced.name', 'LIKE', "%{$search_column['user_forced']}%");
        }
        if ($search_column['forced_comment'] != '' && $search_column['forced_comment'] != NULL) {
            $sql->where('trans_order.forced_comment', 'LIKE', "%{$search_column['forced_comment']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('trans_order.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }
        if ($search_column['user_create'] != '' && $search_column['user_create'] != NULL) {
            $sql->where('user_create.name', 'LIKE', "%{$search_column['user_create']}%");
        }
        if ($search_column['updated_at'] != '' && $search_column['updated_at'] != NULL) {
            $sql->where('trans_order.updated_at', 'LIKE', "%{$search_column['updated_at']}%");
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
