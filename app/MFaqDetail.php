<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MFaqDetail extends Model
{
    protected $table = 'm_faq_detail';

    public function faq()
    {
        return $this->belongsTo('App\MFaq', 'id_faq', 'id');
    }
}
