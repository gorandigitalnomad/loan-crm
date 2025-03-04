<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Adviser extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function cashLoans(): HasMany
    {
        return $this->hasMany(CashLoan::class);
    }

    public function homeLoans(): HasMany
    {
        return $this->hasMany(HomeLoan::class);
    }
}
