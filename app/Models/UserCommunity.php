<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserCommunity
 */
class UserCommunity extends Model {

    public $timestamps = true;
    protected $fillable = [
        'id',
        'community_id',
        'user_id'
    ];
    protected $guarded = [];

    public function community() {
        return $this->belongsTo('\App\Models\Community');
    }

    public function user() {
        return $this->belongsTo('User');
    }

}
