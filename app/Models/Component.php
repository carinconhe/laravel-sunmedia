<?php

namespace Sunmedia\Models;

use Illuminate\Database\Eloquent\Model;
use Sunmedia\Models\TypeComponent;

class Component extends Model
{
    protected $table = 'components';
    protected $fillable = [
        'name',
        'type_components_id', 
        'video',
        'image',
        'text',
        'size',
        'format',
        'url',
        'width', 
        'height', 
        'location_x', 
        'location_y', 
        'location_z', 
        'status'
    ];

    public function typeComponents()
    {
        return $this->belongsTo(TypeComponent::class, 'type_components_id');
    }
}
