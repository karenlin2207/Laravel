<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Product extends Model
{
    use Taggable;

    protected $visible = ['id', 'user_id', 'category_id', 'name', 'market_price', 'sale_price', 'short_describe', 'describe', 'img_uri', 'is_show'];
    //
    protected $fillable = ['user_id', 'category_id', 'name', 'market_price', 'sale_price', 'short_describe', 'describe', 'img_uri', 'is_show'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
