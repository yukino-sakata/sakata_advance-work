<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
    ];

    protected $hidden = [
        'created_time',
        'updated_time'
    ];

    public function user(){
        return $this -> belongsTo('User::class');
    }

    public function shop(){
        return $this -> belongsTo('App\Models\Shop');
    }
}
