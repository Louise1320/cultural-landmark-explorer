<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['session_id', 'landmark_id'];

    public function landmark()
    {
        return $this->belongsTo(Landmark::class);
    }
}