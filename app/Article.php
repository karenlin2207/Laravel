<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Article extends Model
{
    use Taggable;

    protected $visible = ['user_id', 'type', 'title', 'short_describe', 'describe', 'img_url', 'is_show'];
    //
    protected $fillable = ['user_id', 'type','title', 'short_describe', 'describe', 'img_uri', 'is_show'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
