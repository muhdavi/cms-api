<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'image'
    ];
    /**
     * image
     *
     * @return Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('/storage/sliders/' . $value),
        );
    }
}
