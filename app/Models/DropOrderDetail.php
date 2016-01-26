<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DropOrderDetail
 */
class DropOrderDetail extends Model
{

    public $timestamps = true;

    protected $fillable = [
        '_id',
        'drop_orders_id',
        'amount',
        'payment_type',
        'other_payment_details'
    ];

    protected $guarded = [];

        
}