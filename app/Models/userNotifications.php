<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userNotifications extends Model
{
    use HasFactory;

    protected $table = 'user_notifications';

    protected $fillable = [
        'unique_id',
        'for_job_post',
        'for_user',
        'type',
        'seen',
        'created_at'
    ];
}
