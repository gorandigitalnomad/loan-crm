<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'adviser_id',
    ];

    public function adviser(): BelongsTo
    {
        return $this->belongsTo(Adviser::class);
    }

    public function cashLoan(): HasOne
    {
        return $this->hasOne(CashLoan::class);
    }

    public function homeLoan(): HasOne
    {
        return $this->hasOne(HomeLoan::class);
    }
}
