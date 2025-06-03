<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Town extends Model
{
    use HasTranslations;

    public $translatable = ['name'];

    protected $table = 'towns';
    public $timestamps = true;
    protected $fillable = array('name');

    public function city()
    {
        return $this->belongsTo('App\Models\City','city_id');
    }

    public function facilities()
    {
        return $this->hasMany('App\Models\Facility', 'town_id');
    }

}
