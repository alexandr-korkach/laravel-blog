<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Sluggable;


    protected $fillable = ['title'];
    public $timestamps = false;


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function articles() {
        return $this->hasMany(Article::class);
    }

    public function scopeFindBySlug($query, $slug){
        return $query->with('articles')->where('slug', $slug)->firstOrFail();
    }
}
