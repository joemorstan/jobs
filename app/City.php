<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany('App\Users');
    }
}
