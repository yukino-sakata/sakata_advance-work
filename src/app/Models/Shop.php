<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_name',
        'area',
        'genre'
    ];

    public function bookmark(){
        return $this->hasMany('App\Models\Bookmark');
    }

    public function scopeAreaSearch($query, $area)
    {
        if (!empty($area)) {
        $query->where('area', $area);
        }
    }

    public function scopeGenreSearch($query, $genre)
    {
        if (!empty($genre)) {
        $query->where('genre', $genre);
        }
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
        $query->where('shop_name', 'like', '%' . $keyword . '%')
        ->orWhere('comment', 'like', '%' . $keyword . '%');
        }
    }

}