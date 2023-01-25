<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MButtonStep extends Model
{
    protected $table = 'm_button_step';

    public function program_step()
    {
        return $this->belongsTo('App\MProgramStep', 'id_program_step', 'id');
    }

    public function user_create()
    {
        return $this->belongsTo('App\User', 'created_id', 'id');
    }

    public function user_update()
    {
        return $this->belongsTo('App\User', 'updated_id', 'id');
    }

}
