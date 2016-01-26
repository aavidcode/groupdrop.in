<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PollsDemand
 */
class PollsDemand extends Model {

    public $timestamps = true;
    protected $fillable = [
        'id',
        'owner_user_id',
        'community_id',
        'title',
        'total_votes',
        'is_activated',
        'slug',
        'type',
        'description',
        'expiry',
        'default_image_url',
        'is_converted_to_drop'
    ];
    protected $guarded = [];

    public function user() {
        return $this->belongsTo('\App\Models\User');
    }

    public function details() {
        return $this->hasMany('\App\Models\PollsDemandsDetail');
    }

    public function votes() {
        return $this->hasMany('\App\Models\PollDemandsVote');
    }

    public function isVoted() {
        $vote = \App\Models\PollDemandsVote::findOrNew(1)->where(array(
                    'user_id' => \Auth::user()->id,
                    'polls_demand_id' => $this->id
                ))->get();
        return $vote->count() > 0;
    }

}
