<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'image'
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url ('/storage/categories/' .value),
        );
    }
}
