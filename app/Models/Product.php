<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 */
class Product extends Model
{

    public $timestamps = true;

    protected $fillable = [
        '_id',
        'title',
        'banner',
        'description',
        'community_id',
        'is_activated',
        'image_url',
        'terms',
        'price'
    ];

    protected $guarded = [];

        
}