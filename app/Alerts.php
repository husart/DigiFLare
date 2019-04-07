<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alerts extends Model
{
    protected $table = 'alerts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'device_id', 'latitude', 'longitude', 'status'
    ];
}
