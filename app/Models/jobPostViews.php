<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobPostViews extends Model
{
    use HasFactory;
    
    protected $table = 'job_post_views';

    protected $fillable = [
        'for_job_post',
        'for_user',
        'ip_address',
        'created_at'
    ];
}
