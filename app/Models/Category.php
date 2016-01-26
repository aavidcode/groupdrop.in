<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 */
class Category extends Model
{

    public $timestamps = true;

    protected $fillable = [
        '_id',
        'name',
        'slug'
    ];

    protected $guarded = [];

        
}