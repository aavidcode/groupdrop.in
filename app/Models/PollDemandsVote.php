<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PollDemandsVote
 */
class PollDemandsVote extends Model
{

    public $timestamps = true;

    protected $fillable = [
        '_id',
        'poll_demands_details_id',
        'user_id'
    ];

    protected $guarded = [];

        
}