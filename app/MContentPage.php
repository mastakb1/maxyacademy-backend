<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MContentPage extends Model
{
    protected $table = 'm_content_page';

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
        $sql = MContentPage::select('m_content_page.*', 'user_create.name as user_create_name', 'user_update.name as user_update_name')
        ->join('users as user_create', 'user_create.id', 'm_content_page.created_id')
        ->join('users as user_update', 'user_update.id', 'm_content_page.updated_id')
        ->orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('m_content_page.id', 'LIKE', "%{$search}%")
            ->orWhere('m_content_page.name', 'LIKE', "%{$search}%")
            ->orWhere('m_content_page.type', 'LIKE', "%{$search}%")
            ->orWhere('m_content_page.heading', 'LIKE', "%{$search}%")
            ->orWhere('m_content_page.title', 'LIKE', "%{$search}%")
            ->orWhere('m_content_page.slug', 'LIKE', "%{$search}%")
            ->orWhere('m_content_page.meta_keyword', 'LIKE', "%{$search}%")
            ->orWhere('m_content_page.meta_description', 'LIKE', "%{$search}%")
            ->orWhere('m_content_page.status', 'LIKE', "%{$search}%")
            ->orWhere('m_content_page.created_at', 'LIKE', "%{$search}%")
            ->orWhere('user_create.name', 'LIKE', "%{$search}%")
            ->orWhere('m_content_page.updated_at', 'LIKE', "%{$search}%")
            ->orWhere('user_update.name', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('m_content_page.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['name'] != '' && $search_column['name'] != NULL) {
            $sql->where('m_content_page.name', 'LIKE', "%{$search_column['name']}%");
        }
        if ($search_column['type'] != '' && $search_column['type'] != NULL) {
            $sql->where('m_content_page.type', 'LIKE', "%{$search_column['type']}%");
        }
        if ($search_column['heading'] != '' && $search_column['heading'] != NULL) {
            $sql->where('m_content_page.heading', 'LIKE', "%{$search_column['heading']}%");
        }
        if ($search_column['title'] != '' && $search_column['title'] != NULL) {
            $sql->where('m_content_page.title', 'LIKE', "%{$search_column['title']}%");
        }
        if ($search_column['slug'] != '' && $search_column['slug'] != NULL) {
            $sql->where('m_content_page.slug', 'LIKE', "%{$search_column['slug']}%");
        }
        if ($search_column['meta_keyword'] != '' && $search_column['meta_keyword'] != NULL) {
            $sql->where('m_content_page.meta_keyword', 'LIKE', "%{$search_column['meta_keyword']}%");
        }
        if ($search_column['meta_description'] != '' && $search_column['meta_description'] != NULL) {
            $sql->where('m_content_page.meta_description', 'LIKE', "%{$search_column['meta_description']}%");
        }
        if ($search_column['status'] != '' && $search_column['status'] != NULL) {
            $sql->where('m_content_page.status', 'LIKE', "%{$search_column['status']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('m_content_page.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }
        if ($search_column['user_create'] != '' && $search_column['user_create'] != NULL) {
            $sql->where('user_create.name', 'LIKE', "%{$search_column['user_create']}%");
        }
        if ($search_column['updated_at'] != '' && $search_column['updated_at'] != NULL) {
            $sql->where('m_content_page.updated_at', 'LIKE', "%{$search_column['updated_at']}%");
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
