<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobLevels extends Model
{
    use HasFactory;

    protected $table = 'job_levels';

    protected $fillable = [
        'name',
        'slug'
    ];
}
