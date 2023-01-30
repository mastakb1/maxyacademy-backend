<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberOrganization extends Model
{
    protected $table = 'member_organization';

    public function member()
    {
        return $this->belongsTo('App\Member', 'id_member', 'id');
    }
}
