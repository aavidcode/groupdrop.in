<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DropStage
 */
class DropStage extends Model
{

    public $timestamps = true;

    protected $fillable = [
        '_id',
        'drop_id',
        'joins_needed',
        'price',
        'is_unlocked'
    ];

    protected $guarded = [];

        
}