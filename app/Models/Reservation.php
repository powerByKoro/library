<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int id
 * @property int user_id
 * @property-read Book[] $books
 */
class Reservation extends Model
{
    protected $table = 'reservations';

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'reservation_books');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
