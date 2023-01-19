<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberTranscript extends Model
{
    protected $table = 'member_transcript';

    public function member()
    {
    return $this->belongsTo('App\Member', 'id_member', 'id');
    }
}
