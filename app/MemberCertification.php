<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberCertification extends Model
{
    protected $table = 'member_certification';

    public function member()
    {
        return $this->belongsTo('App\Member', 'id_member', 'id');
    }
}
