<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MBankAccount extends Model
{
    protected $table = 'm_bank_account';

    public function user_create()
    {
        return $this->belongsTo('App\User', 'created_id', 'id');
    }

    public function user_update()
    {
        return $this->belongsTo('App\User', 'updated_id', 'id');
    }

    public function bank()
    {
        return $this->belongsTo('App\MBank', 'id_m_bank', 'id');
    }

    public function filter($order_field, $order_ascdesc, $search, $search_column, $limit, $startLimit)
    {
        $sql = MBankAccount::select('m_bank_account.*', 'user_create.name as user_create_name', 'user_update.name as user_update_name', 'm_bank.name as bank')
        ->join('users as user_create', 'user_create.id', 'm_bank_account.created_id')
        ->join('users as user_update', 'user_update.id', 'm_bank_account.updated_id')
        ->join('m_bank', 'm_bank.id', 'm_bank_account.id_m_bank')
        ->orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('m_bank_account.id', 'LIKE', "%{$search}%")
            ->orWhere('m_bank_account.account_name', 'LIKE', "%{$search}%")
            ->orWhere('m_bank_account.account_number', 'LIKE', "%{$search}%")
            ->orWhere('m_bank_account.description', 'LIKE', "%{$search}%")
            ->orWhere('m_bank_account.status', 'LIKE', "%{$search}%")
            ->orWhere('m_bank_account.created_at', 'LIKE', "%{$search}%")
            ->orWhere('m_bank.name', 'LIKE', "%{$search}%")
            ->orWhere('user_create.name', 'LIKE', "%{$search}%")
            ->orWhere('m_bank_account.updated_at', 'LIKE', "%{$search}%")
            ->orWhere('user_update.name', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('m_bank_account.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['account_name'] != '' && $search_column['account_name'] != NULL) {
            $sql->where('m_bank_account.account_name', 'LIKE', "%{$search_column['account_name']}%");
        }
        if ($search_column['account_number'] != '' && $search_column['account_number'] != NULL) {
            $sql->where('m_bank_account.account_number', 'LIKE', "%{$search_column['account_number']}%");
        }
        if ($search_column['bank'] != '' && $search_column['bank'] != NULL) {
            $sql->where('m_bank.name', 'LIKE', "%{$search_column['bank']}%");
        }
        if ($search_column['description'] != '' && $search_column['description'] != NULL) {
            $sql->where('m_bank_account.description', 'LIKE', "%{$search_column['description']}%");
        }
        if ($search_column['status'] != '' && $search_column['status'] != NULL) {
            $sql->where('m_bank_account.status', 'LIKE', "%{$search_column['status']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('m_bank_account.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }
        if ($search_column['user_create'] != '' && $search_column['user_create'] != NULL) {
            $sql->where('user_create.name', 'LIKE', "%{$search_column['user_create']}%");
        }
        if ($search_column['updated_at'] != '' && $search_column['updated_at'] != NULL) {
            $sql->where('m_bank_account.updated_at', 'LIKE', "%{$search_column['updated_at']}%");
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
