<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected static function boot() {
        parent::boot();

        static::creating(function($reply) {
            $reply->user_id = auth()->id();
        });
    }

    protected $guarded = [];

    public function question() {
        return $this->belongsTo('App\Models\Question');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function likes() {
        return $this->hasMany('App\Models\Like');
    }
}
