<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faqPage extends Model
{
    use HasFactory;

    protected $table = 'faq_page';

    protected $fillable = [
        'question',
        'answer'
    ];
}
