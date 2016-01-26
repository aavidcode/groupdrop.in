<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DropDiscussion
 */
class DropDiscussion extends Model
{

    public $timestamps = true;

    protected $fillable = [
        '_id',
        'comment',
        'drop_id',
        'likes',
        'is_activated'
    ];

    protected $guarded = [];

        
}