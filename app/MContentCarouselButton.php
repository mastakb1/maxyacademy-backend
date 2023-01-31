<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MContentCarouselButton extends Model
{
    protected $table = 'm_content_carousel_button';

    public function content_carousel()
    {
        return $this->belongsTo('App\MContentCarousel', 'id_content_carousel', 'id');
    }
}
