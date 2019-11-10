<?php

namespace Sunmedia\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    public function components(){
        return $this->belongsTo('Sunmedia\Models\Components');
    }
}
