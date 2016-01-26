<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Community
 */
class Community extends Model
{

    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'image_url',
        'slug'
    ];

    protected $guarded = [];

        
}