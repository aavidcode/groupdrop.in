<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Preference
 */
class Preference extends Model
{

    public $timestamps = false;

    protected $fillable = [
        '_id',
        'pref_key',
        'pref_value'
    ];

    protected $guarded = [];

        
}