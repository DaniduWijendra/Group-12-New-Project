<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class policyHolder extends Model
{
    use Searchable;
    protected static function boot()
{
    parent::boot(); 

    static::updated(function () {
        return Cache::forget('activeChannels');
    });
}
}
