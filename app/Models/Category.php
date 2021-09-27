<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Category extends Model
{
    use HasFactory;

    protected $fillable =[
        'name'
    ];

    public function articles(){
        return $this->belongsToMany(Article::class);
    }
    public function parentCategory(){
        return $this->belongsTo(Category::class);
    }
    public function childrenCategory(){
        return $this->hasMany(Category::class,'parent_id');
    }
}
