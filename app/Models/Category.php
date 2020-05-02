<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Category extends Model
{
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::creating(function($category) {
            $category->slug = Str::of($category->name)->slug('-');
        });

        static::updating(function($category) {
            $category->slug = Str::of($category->name)->slug('-');
        });

        static::deleting(function($category) {
            $category->questions()->each(function ($question) {
                $question->category()->dissociate();
                $question->save();
            });
        });
    }

    public function questions() {
        return $this->hasMany('App\Models\Question');
    }
}
