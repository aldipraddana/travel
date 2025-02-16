<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TravelDestination extends Model
{
    protected static function booted() :void
    {
        static::creating(function (self $value) {
            $value->created_by = Auth::id(); 
            $value->updated_by = Auth::id(); 
        });

        static::updating(function (self $value) {
            $value->updated_by = Auth::id();
        });
    }
}
