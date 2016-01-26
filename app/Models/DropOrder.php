<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DropOrder
 */
class DropOrder extends Model
{

    public $timestamps = true;

    protected $fillable = [
        '_id',
        'drop_id',
        'user_id',
        'balance_amt',
        'total_price'
    ];

    protected $guarded = [];

        
}