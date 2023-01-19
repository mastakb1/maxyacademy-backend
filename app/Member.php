<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';

    public function classes()
    {
        return $this->hasMany('App\CourseClassMember', 'id_member', 'id');
    }
    
    public function transcripts()
    {
        return $this->hasMany('App\MemberTranscript', 'id_member', 'id');
    }

    public function filter($order_field, $order_ascdesc, $search, $search_column, $limit, $startLimit)
    {
        $sql = Member::select('member.*')->orderBy($order_field, $order_ascdesc);

        if ($search != '' && $search != NULL) {
            $sql->where('member.id', 'LIKE', "%{$search}%")
            ->orWhere('member.nama', 'LIKE', "%{$search}%")
            ->orWhere('member.email', 'LIKE', "%{$search}%")
            ->orWhere('member.status', 'LIKE', "%{$search}%")
            ->orWhere('member.created_at', 'LIKE', "%{$search}%")
            ->orWhere('member.updated_at', 'LIKE', "%{$search}%");
        }

        if ($search_column['id'] != '' && $search_column['id'] != NULL) {
            $sql->where('member.id', 'LIKE', "%{$search_column['id']}%");
        }
        if ($search_column['nama'] != '' && $search_column['nama'] != NULL) {
            $sql->where('member.nama', 'LIKE', "%{$search_column['nama']}%");
        }
        if ($search_column['email'] != '' && $search_column['email'] != NULL) {
            $sql->where('member.email', 'LIKE', "%{$search_column['email']}%");
        }
        if ($search_column['status'] != '' && $search_column['status'] != NULL) {
            $sql->where('member.status', 'LIKE', "%{$search_column['status']}%");
        }
        if ($search_column['created_at'] != '' && $search_column['created_at'] != NULL) {
            $sql->where('member.created_at', 'LIKE', "%{$search_column['created_at']}%");
        }
        if ($search_column['updated_at'] != '' && $search_column['updated_at'] != NULL) {
            $sql->where('member.updated_at', 'LIKE', "%{$search_column['updated_at']}%");
        }

        $filter_count = $sql->count();
        $filter_data = $sql->offset($startLimit)->limit($limit)->get();

        $data = ['filter_count' => $filter_count, 'filter_data' => $filter_data];
        return $data;
    }
}
