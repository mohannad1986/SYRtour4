<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

use Illuminate\Database\Eloquent\Relations\HasManyThrough;


class City extends Model
{
     use HasTranslations;

     public $translatable = ['name'];

    protected $table = 'citys';
    public $timestamps = true;
    protected $fillable = array('name');

    public function towns()
    {
        return $this->hasMany('Town');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','cits_categors');
    }

      // +++++ الربط بجدزل الصور ++++ المورفزم

      public function images(): MorphOne
      {
        //   return $this->MorphOne('App\Models\Image','imageable');
        return $this->morphOne(Image::class, 'imageable');

      }
    //    علاقة هاس ماني ثرو مع المنشأت عبر مودل القرى
      public function facilities()
      {
          return $this->hasManyThrough('App\Models\Facility', 'App\Models\Town', 'city_id', 'town_id', 'id', 'id');
      }




}
