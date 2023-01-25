<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberExperience extends Model
{
    protected $table = 'member_experience';

    public function member()
    {
        return $this->belongsTo('App\Member', 'id_member', 'id');
    }
}
