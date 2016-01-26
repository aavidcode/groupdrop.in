<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PollsDemandsDiscussionImage
 */
class PollsDemandsDiscussionImage extends Model
{

    public $timestamps = true;

    protected $fillable = [
        '_id',
        'image_type',
        'image_url',
        'polls_demands_discussions_id'
    ];

    protected $guarded = [];

        
}