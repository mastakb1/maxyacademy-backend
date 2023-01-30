<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberPortfolio extends Model
{
    protected $table = 'member_portfolio';

    public function member()
    {
        return $this->belongsTo('App\Member', 'id_member', 'id');
    }
}
