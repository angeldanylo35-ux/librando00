<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetCode extends Model
{
    protected $fillable = ['email', 'code_hash', 'attempts', 'expires_at'];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    /** Máximo de tentativas erradas antes de invalidar o código. */
    public const MAX_ATTEMPTS = 5;

    public function attemptsExceeded(): bool
    {
        return $this->attempts >= self::MAX_ATTEMPTS;
    }
}