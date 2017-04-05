<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $visible = ['id', 'name', 'img_uri', 'is_show', 'link'];
    //
    protected $fillable = ['id', 'name', 'img_uri', 'is_show', 'link'];

}
