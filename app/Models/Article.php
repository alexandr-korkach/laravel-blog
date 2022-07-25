<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
    public function getFormattedDateString(){
        $date = Carbon::parse($this->created_at)->locale('uk');
        return Str::ucfirst($date->translatedFormat('M d, Y'));
    }

    public function getFormattedCommentCount(){
        $count = $this->comments()->count();
        $word = true_wordform($count, 'коментарів', 'коментар', 'коментаря', 'коментарів');
        return "$count $word";

    }



    public function scopeLastLimit($query, $numbers)
    {
        return $query->with('tags', 'category', 'comments', 'user')
            ->orderBy('created_at', 'desc')->limit($numbers)->get();
    }

    public function scopeAllPaginate($query, $number = 6)
    {
        return $query->with('tags', 'category', 'comments', 'user')->orderBy('created_at', 'desc')->paginate($number);
    }
    public function scopeFindBySlug($query, $slug)
    {
        return $query->with('tags', 'category', 'comments', 'user')->where('slug', $slug)->firstOrFail();
    }

    public function scopeAllPaginateByCategory($query, $number = 6)
    {
        return $query->with('tags', 'comments', 'user')->orderBy('created_at', 'desc')->paginate($number);
    }
    public function scopeSearchByTitle($query, $string, $number = 6){
        return $query->with('tags', 'category', 'comments', 'user')->where('title', 'LIKE', "%{$string}%")
            ->orderBy('created_at', 'desc')->paginate($number);
    }









}
