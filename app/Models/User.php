<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 */
class User extends Model {

    public $timestamps = true;
    protected $fillable = [
        'firstname',
        'email',
        'password',
        'profile_img_url',
        'slug',
        'total_points',
        'last_login',
        'is_privacy',
        'address',
        'pincode',
        'user_name',
        'is_activate',
        'activation_code'
    ];
    protected $guarded = [];

    public function userCommunities() {
        return $this->hasMany('\App\Models\UserCommunity');
    }

    public function polls() {
        return $this->hasMany('\App\Models\PollsDemand');
    }

    public function getActivationCode() {
        $this->activation_code = $activationCode = str_random(40);
        $this->save();
        return $activationCode;
    }

}
