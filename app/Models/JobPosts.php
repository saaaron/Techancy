<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosts extends Model
{
    use HasFactory;

    // public $timestamps = false; // Disable timestamps
    
    protected $table = 'job_posts';

    protected $fillable = [
        'unique_id',
        'by_user',
        'role',
        'level',
        'description',
        'type',
        'applicants',
        'applicants_applied',
        'payment',
        'payment_day',
        'views',
        'updated_at',
        'created_at'
    ];

    // Define the relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'by_user');
    }

    // Define the relationship to Roles
    public function jobRole()
    {
        return $this->belongsTo(JobCategories::class, 'role', 'slug');
    }

    // Define the relationship to Levels
    public function jobLevel()
    {
        return $this->belongsTo(JobLevels::class, 'level', 'slug');
    }

    // Define the relationshp to type
    public function jobType()
    {
        return $this->belongsTo(JobTypes::class, 'type', 'slug');
    }

    // Define the relationship to payment days
    public function jobPaymentDay()
    {
        return $this->belongsTo(JobPaymentDays::class, 'payment_day', 'slug');
    }
}
