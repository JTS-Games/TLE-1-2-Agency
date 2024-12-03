<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    public function user():belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function company():belongsTo
    {
        return  $this->belongsTo(Company::class);
    }
}
