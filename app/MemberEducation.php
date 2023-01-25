<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberEducation extends Model
{
    protected $table = 'member_education';

    public function member()
    {
        return $this->belongsTo('App\Member', 'id_member', 'id');
    }
}
