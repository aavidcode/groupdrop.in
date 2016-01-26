<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductAttribute
 */
class ProductAttribute extends Model
{

    public $timestamps = true;

    protected $fillable = [
        '_id',
        'category_attributes_id',
        'attribute_value',
        'prod_id'
    ];

    protected $guarded = [];

        
}