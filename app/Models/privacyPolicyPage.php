<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class privacyPolicyPage extends Model
{
    use HasFactory;

    protected $table = 'privacy_policy_page';

    protected $fillable = [
        'privacy_policy',
        'updated_at'
    ];
}
