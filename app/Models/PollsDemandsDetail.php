<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PollsDemandsDetail
 */
class PollsDemandsDetail extends Model {

    public $timestamps = true;
    protected $fillable = [
        '_id',
        'polls_demands_id',
        'user_id',
        'title',
        'image_url',
        'product_url',
        'total_votes',
        'is_activated',
        'product_id',
        'is_owner',
        'create_at'
    ];
    protected $guarded = [];

    public function getVote() {
        return $this->belongsTo('\App\Models\PollDemandsVote');
    }

    public function isVoted() {
        $vote = \App\Models\PollDemandsVote::findOrNew(1)->where(array(
                    'user_id' => \Auth::user()->id,
                    'polls_demands_details_id' => $this->id
                ))->get();
        return $vote->count() > 0;
    }

}
