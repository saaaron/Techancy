<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class termsOfUsePage extends Model
{
    use HasFactory;

    protected $table = 'terms_of_use_page';

    protected $fillable = [
        'terms_of_use',
        'updated_at'
    ];
}
