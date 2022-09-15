<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Aspirant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function party(): BelongsTo
    {
        return $this->belongsTo(Party::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }


    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }
}
