<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PollsDemandsDiscussion
 */
class PollsDemandsDiscussion extends Model
{

    public $timestamps = true;

    protected $fillable = [
        '_id',
        'comment',
        'polls_demands_id',
        'likes',
        'is_activated'
    ];

    protected $guarded = [];

    public function user() {
        return $this->belongsTo('\App\Models\User');
    }
        
}