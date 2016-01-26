<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Drop
 */
class Drop extends Model
{

    public $timestamps = true;

    protected $fillable = [
        '_id',
        'polls_demands_details_id',
        'title',
        'mrp_price',
        'slug',
        'terms',
        'total_joins',
        'product_description',
        'expiry',
        'total_commit_to_joins',
        'banner',
        'total_price_stages',
        'current_unlocked_price',
        'is_activated',
        'community_id',
        'total_stock'
    ];

    protected $guarded = [];

        
}