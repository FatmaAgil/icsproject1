<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
     // Specify the table associated with the model (optional if the table name follows Laravel's naming convention)
     protected $table = 'faqs';

     // Specify the attributes that are mass assignable
     protected $fillable = ['question', 'answer'];

}
