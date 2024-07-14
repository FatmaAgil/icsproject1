<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlasticForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone_number',
        'plastic_type',
        'quantity',
        'condition',
        'collection_date',
        'collection_time',
        'instructions',
        'payment_method',
        'bank_details',
        'comments',
    ];
}
