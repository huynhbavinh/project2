<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Article extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'title',
        'content',
        'category_id',
    ];

    public function tags(){
        return $this->belongsToManyMany(Tag::class,'article_tags');
    }
    public function category(){
        return $this->belongsToMany(Category::class);
    }
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
