<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DropDiscussionImage
 */
class DropDiscussionImage extends Model
{

    public $timestamps = false;

    protected $fillable = [
        '_id',
        'image_type',
        'image_url',
        'drop_discussions_id'
    ];

    protected $guarded = [];

        
}