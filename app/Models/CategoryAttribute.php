<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoryAttribute
 */
class CategoryAttribute extends Model
{

    public $timestamps = false;

    protected $fillable = [
        '_id',
        'category_id',
        'attribute_name'
    ];

    protected $guarded = [];

        
}