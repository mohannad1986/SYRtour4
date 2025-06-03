<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;


use Illuminate\Database\Eloquent\Relations\MorphMany;


class Facility extends Model
{

    use HasTranslations;
    public $translatable = ['name'];



    protected $table = 'facilits';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'owner_id', 'category_id','town_id');

    public function owner()
    {
        return $this->belongsTo('App\Models\Owner', 'owner_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function town()
    {
        return $this->belongsTo('App\Models\Town', 'town_id');
    }


    // +++++ الربط بجدزل الصور ++++ المورفزم

    public function images(): MorphMany
    {
        return $this->morphMany('App\Models\Image','imageable');
    }





}
