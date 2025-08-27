<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'category_id', 'user_id', 'content', 'image', 'description'
    ];

    public function category()
    {
        return $this->beLongTo(Category::class);
    }
    public function user ()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    public function tags ()
    {
        return $this->belongToMany(Tags::class);
    }
    /**
     * image
     *
     * @return Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('/storage/posts/' . $value),
        );
    }

    /**
     * createdAt
     *
     * @return Attribute
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::locale('id')->parse($value)->translatedFormat('l, d F Y'),
        );
    }

    /**
     * updatedAt
     *
     * @return Attribute
     */
    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::locale('id')->parse($value)->translatedFormat('l, d F Y'),
        );
    }
}
