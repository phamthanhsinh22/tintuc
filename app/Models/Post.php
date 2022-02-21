<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug_post',
        'content',
        'summary',
        'images',
        'active',
        'featured',
        'luotxem',
        'hot',
        'popular',
        'trending',
        'type_id'
    ];
    protected static function booted()
    {
        static::creating(function ($post){
            $post->title = strtoupper($post->title);
        });
    }
    public function type(){
        return $this->belongsTo('App\Models\Type','type_id','id');
    }
    

}
