<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reservation extends Model
{
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
