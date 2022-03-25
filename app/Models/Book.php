<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    public function reservations(): BelongsToMany
    {
        return $this->belongsToMany(Reservation::class);
    }
}
