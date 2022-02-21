<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = [
        'typName',
        'slug_typ',
        'Active',
        'category_id'
    ];
    protected static function booted()
    {
        static::creating(function ($type){
            $type->typName = strtoupper($type->typName);
        });
    }
    public function post(){
        return $this->hasMany('App\Models\Post','type_id','id');
    }
}
