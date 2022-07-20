<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;
    use Sluggable;


    protected $fillable = ['title', 'description', 'body', 'img', 'category_id'];


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

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function shortTitle($number){

        return Str::limit($this->title, $number);

    }

    public function scopeLastLimit($query, $numbers)
    {
        return $query->with('tags', 'category', 'comments', 'user')
            ->orderBy('created_at', 'desc')->limit($numbers)->get();
    }

    public function scopeAllPaginate($query, $numbers)
    {
        return $query->with('tags', 'category', 'comments', 'user')->orderBy('created_at', 'desc')->paginate($numbers);
    }







}
