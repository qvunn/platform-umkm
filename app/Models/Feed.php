<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'contents',
        'likes',
    ];

    public function category(){
        return $this->belongsTo(Categorie::class);
    }
}