<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPaymentDays extends Model
{
    use HasFactory;

    protected $table = 'job_payment_days';

    protected $fillable = [
        'name',
        'slug'
    ];
}
