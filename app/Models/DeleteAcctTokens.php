<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeleteAcctTokens extends Model
{
    use HasFactory;

    public $timestamps = false; // Disable timestamps
    
    protected $table = 'delete_acct_tokens';

    protected $fillable = [
        'email',
        'token',
        'created_at'
    ];

    // User relationship
    public function user() {
        return $this->belongsTo(User::class);
    }
}
