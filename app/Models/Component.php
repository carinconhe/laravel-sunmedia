<?php

namespace Sunmedia\Models;

use Illuminate\Database\Eloquent\Model;
use Sunmedia\Models\TypeComponent;

class Component extends Model{
    protected $table = 'components';

    public function typeComponents(){
        return $this->belongsTo(TypeComponent::class,'type_components_id');
    }

}
