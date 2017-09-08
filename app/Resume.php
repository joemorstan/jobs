<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Resume
 *
 * @property-read \Cartalyst\Sentinel\Users\EloquentUser $user
 * @mixin \Eloquent
 */
class Resume extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 'description', 'active', 'title', 'salary', 'city_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function favorites()
    {
        return $this->belongsToMany('App\User');
    }
}
