<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';

    public function filter($order_field, $order_ascdesc, $search, $search_column, $limit, $startLimit)
    {
        $sql = Message::orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('message.id', 'LIKE', "%{$search}%")
            ->orWhere('message.name', 'LIKE', "%{$search}%")
            ->orWhere('message.email', 'LIKE', "%{$search}%")
            ->orWhere('message.subject', 'LIKE', "%{$search}%")
            ->orWhere('message.message', 'LIKE', "%{$search}%")
            ->orWhere('message.created_at', 'LIKE', "%{$search}%")
            ->orWhere('message.updated_at', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('message.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['name'] != '' && $search_column['name'] != NULL) {
            $sql->where('message.name', 'LIKE', "%{$search_column['name']}%");
        }
        if ($search_column['email'] != '' && $search_column['email'] != NULL) {
            $sql->where('message.email', 'LIKE', "%{$search_column['email']}%");
        }
        if ($search_column['subject'] != '' && $search_column['subject'] != NULL) {
            $sql->where('message.subject', 'LIKE', "%{$search_column['subject']}%");
        }
        if ($search_column['message'] != '' && $search_column['message'] != NULL) {
            $sql->where('message.message', 'LIKE', "%{$search_column['message']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('message.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }
        if ($search_column['updated_at'] != '' && $search_column['updated_at'] != NULL) {
            $sql->where('message.updated_at', 'LIKE', "%{$search_column['updated_at']}%");
        }

        $filter_count = $sql->count();
        $filter_data = $sql->offset($startLimit)->limit($limit)->get();

        $data = ['filter_count' => $filter_count, 'filter_data' => $filter_data];
        return $data;
    }
}
