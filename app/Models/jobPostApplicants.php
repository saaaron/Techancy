<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobPostApplicants extends Model
{
    use HasFactory;

    protected $table = 'job_post_applicants';

    protected $fillable = [
        'for_notification',
        'for_job_post',
        'for_user',
        'name',
        'email',
        'resume',
        'cover_letter',
        'seen',
        'created_at'
    ];
}
