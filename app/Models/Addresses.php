<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Addresses extends Model
{
    use HasFactory;


    public function customer(): belongsTo
    {
        return $this->belongsTo(Customers::class);
    }
}
