<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static find(array|bool|string|null $id)
 */
class Customers extends Model
    /** @mixin *Eloquent*/
{
    use HasFactory;
    public function addresess(): HasMany
    {
        return $this->hasMany(Addresses::class);
    }
}
