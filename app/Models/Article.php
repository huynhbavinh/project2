<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'content',
        'category_id',
    ];

    public function tags(){
        return $this->belongsToManyMany(Tag::class,'article_tags');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }
}
