<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Category extends Model
{
    use HasTranslations;

    public $translatable = ['name'];
    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name');

    public function Cities()
    {
        return $this->belongsToMany('App\Models\City','cits_categors');
    }
}
