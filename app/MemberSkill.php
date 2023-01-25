<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberSkill extends Model
{
    protected $table = 'member_skill';

    public function member()
    {
        return $this->belongsTo('App\Member', 'id_member', 'id');
    }
}
