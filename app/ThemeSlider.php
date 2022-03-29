<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ThemeSlider extends Model
{
    use  SoftDeletes;
    protected $table = "xit_theme_slider";

    protected $fillable =[
        'image_name'
    ];
}