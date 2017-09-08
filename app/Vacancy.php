<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacancy extends Model
{
    use SoftDeletes;

    protected $table = 'vacancies';
    protected $fillable = [
        'city',
        'title',
        'user_id',
        'company',
        'salary',
        'description',
        'active'
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
