<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\SoftDeletes;

class Owner extends Authenticatable
{

    protected $table = 'owners';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name');

    public function facility()
    {
        return $this->hasOne('App\Models\Facility', 'owner_id');
    }

}
