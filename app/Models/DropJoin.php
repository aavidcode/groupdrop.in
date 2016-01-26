<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DropJoin
 */
class DropJoin extends Model
{

    public $timestamps = true;

    protected $fillable = [
        '_id',
        'user_id',
        'join_or_commit',
        'drop_id'
    ];

    protected $guarded = [];

        
}