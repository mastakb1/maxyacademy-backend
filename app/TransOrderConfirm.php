<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransOrderConfirm extends Model
{
    protected $table = 'trans_order_confirm';

    public function user_create()
    {
        return $this->belongsTo('App\User', 'created_id', 'id');
    }

    public function user_update()
    {
        return $this->belongsTo('App\User', 'updated_id', 'id');
    }

    public function user_verified()
    {
        return $this->belongsTo('App\User', 'verified_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo('App\TransOrder', 'id_trans_order', 'id');
    }

    public function payment_type()
    {
        return $this->belongsTo('App\MPaymentType', 'id_m_payment_type', 'id');
    }

    public function sender_bank()
    {
        return $this->belongsTo('App\MBank', 'sender_bank', 'id');
    }

    public function bank_account()
    {
        return $this->belongsTo('App\MBankAccount', 'id_m_bank_account', 'id');
    }

    public function filter($order_field, $order_ascdesc, $search, $search_column, $limit, $startLimit)
    {
        $sql = TransOrderConfirm::select('trans_order_confirm.*', 'user_create.name as user_create_name', 'user_update.name as user_update_name', 'user_verified.name as user_verified_name', 'm_payment_type.name as payment_type', 'm_bank.name as bank', 'trans_order.order_number', 'member.name as member', 'sbank.name as sender_bank', 'm_bank_account.account_name')
        ->join('users as user_create', 'user_create.id', 'trans_order_confirm.created_id')
        ->join('users as user_update', 'user_update.id', 'trans_order_confirm.updated_id')
        ->leftJoin('users as user_verified', 'user_verified.id', 'trans_order_confirm.verified_id')
        ->join('m_payment_type', 'm_payment_type.id', 'trans_order_confirm.id_m_payment_type')
        ->join('trans_order', 'trans_order.id', 'trans_order_confirm.id_trans_order')
        ->join('member', 'member.id', 'trans_order.id_member')
        ->join('m_bank_account', 'm_bank_account.id', 'trans_order_confirm.id_m_bank_account')
        ->join('m_bank', 'm_bank.id', 'm_bank_account.id_m_bank')
        ->join('m_bank as sbank', 'sbank.id', 'trans_order_confirm.sender_bank')
        ->orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('trans_order_confirm.id', 'LIKE', "%{$search}%")
            ->orWhere('order_course.order_number', 'LIKE', "%{$search}%")
            ->orWhere('trans_order_confirm.trans_order_confirm_number', 'LIKE', "%{$search}%")
            ->orWhere('trans_order_confirm.date', 'LIKE', "%{$search}%")
            ->orWhere('trans_order_confirm.sender_account_name', 'LIKE', "%{$search}%")
            ->orWhere('trans_order_confirm.sender_account_number', 'LIKE', "%{$search}%")
            ->orWhere('sbank.name', 'LIKE', "%{$search}%")
            ->orWhere('m_bank_account.account_name', 'LIKE', "%{$search}%")
            ->orWhere('m_bank.name', 'LIKE', "%{$search}%")
            ->orWhere('trans_order_confirm.amount', 'LIKE', "%{$search}%")
            ->orWhere('trans_order_confirm.status', 'LIKE', "%{$search}%")
            ->orWhere('member.name', 'LIKE', "%{$search}%")
            ->orWhere('trans_order_confirm.verified_at', 'LIKE', "%{$search}%")
            ->orWhere('trans_order_confirm.verified_comment', 'LIKE', "%{$search}%")
            ->orWhere('user_verified.name', 'LIKE', "%{$search}%")
            ->orWhere('order_course.created_at', 'LIKE', "%{$search}%")
            ->orWhere('user_create.name', 'LIKE', "%{$search}%")
            ->orWhere('order_course.updated_at', 'LIKE', "%{$search}%")
            ->orWhere('user_update.name', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('trans_order_confirm.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['order_number'] != '' && $search_column['order_number'] != NULL) {
            $sql->where('trans_order.order_number', 'LIKE', "%{$search_column['order_number']}%");
        }
        if ($search_column['order_confirm_number'] != '' && $search_column['order_confirm_number'] != NULL) {
            $sql->where('trans_order_confirm.order_confirm_number', 'LIKE', "%{$search_column['order_confirm_number']}%");
        }
        if ($search_column['date'] != '' && $search_column['date'] != NULL) {
            $sql->where('trans_order_confirm.date', 'LIKE', "%{$search_column['date']}%");
        }
        if ($search_column['sender_account_name'] != '' && $search_column['sender_account_name'] != NULL) {
            $sql->where('trans_order_confirm.date', 'LIKE', "%{$search_column['sender_account_name']}%");
        }
        if ($search_column['sender_account_number'] != '' && $search_column['sender_account_number'] != NULL) {
            $sql->where('trans_order_confirm.sender_account_number', 'LIKE', "%{$search_column['sender_account_number']}%");
        }
        if ($search_column['sender_bank'] != '' && $search_column['sender_bank'] != NULL) {
            $sql->where('sbank.name', 'LIKE', "%{$search_column['sender_bank']}%");
        }
        if ($search_column['bank'] != '' && $search_column['bank'] != NULL) {
            $sql->where('m_bank.name', 'LIKE', "%{$search_column['bank']}%");
        }
        if ($search_column['account_name'] != '' && $search_column['account_name'] != NULL) {
            $sql->where('m_bank_account.account_name', 'LIKE', "%{$search_column['account_name']}%");
        }
        if ($search_column['amount'] != '' && $search_column['amount'] != NULL) {
            $sql->where('trans_order_confirm.amount', 'LIKE', "%{$search_column['amount']}%");
        }
        if ($search_column['member'] != '' && $search_column['member'] != NULL) {
            $sql->where('member.name', 'LIKE', "%{$search_column['member']}%");
        }
        if ($search_column['status'] != '' && $search_column['status'] != NULL) {
            $sql->where('trans_order_confirm.status', 'LIKE', "%{$search_column['status']}%");
        }
        if ($search_column['verified_at'] != '' && $search_column['verified_at'] != NULL) {
            $sql->where('trans_order_confirm.verified_at', 'LIKE', "%{$search_column['verified_at']}%");
        }
        if ($search_column['user_verified'] != '' && $search_column['user_verified'] != NULL) {
            $sql->where('user_verified.name', 'LIKE', "%{$search_column['user_verified']}%");
        }
        if ($search_column['verified_comment'] != '' && $search_column['verified_comment'] != NULL) {
            $sql->where('trans_order_confirm.verified_comment', 'LIKE', "%{$search_column['verified_comment']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('trans_order_confirm.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }
        if ($search_column['user_create'] != '' && $search_column['user_create'] != NULL) {
            $sql->where('user_create.name', 'LIKE', "%{$search_column['user_create']}%");
        }
        if ($search_column['updated_at'] != '' && $search_column['updated_at'] != NULL) {
            $sql->where('trans_order_confirm.updated_at', 'LIKE', "%{$search_column['updated_at']}%");
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
