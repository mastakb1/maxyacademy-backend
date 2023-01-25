<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberParent extends Model
{
    protected $table = 'member_parent';

    public function member()
    {
        return $this->belongsTo('App\Member', 'id_member', 'id');
    }
}
