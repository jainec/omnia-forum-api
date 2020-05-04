<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{    
    protected $fillable = ['description', 'slug', 'user_id', 'category_id'];

    protected static function boot() {
        parent::boot();

        static::creating(function($question) {
            $question->slug = Str::of($question->description)->slug('-');
        });

        static::updating(function($question) {
            $question->slug = Str::of($question->description)->slug('-');
        });
    }    

    public function getRouteKeyName() {
        return 'slug';
    }

    public function getPathAttribute() {
        return "/question/$this->slug";
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function replies() {
        return $this->hasMany('App\Models\Reply')->latest();
    }
}
