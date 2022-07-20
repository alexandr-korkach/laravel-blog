<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'body', 'article_id'];

    public function article() {
        return $this->belongsTo(Article::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function getFormattedDateString(){
        $date = Carbon::parse($this->created_at)->locale('uk');
        return Str::ucfirst($date->translatedFormat('M d, Y'));
    }



}
