<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailResetTokens extends Model
{
    use HasFactory;

    public $timestamps = false; // Disable timestamps
    
    protected $table = 'email_reset_tokens';

    protected $fillable = [
        'email',
        'token',
        'created_at'
    ];
}
