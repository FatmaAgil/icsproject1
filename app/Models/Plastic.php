<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plastic extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'introduction',
        'environmental_impact',
        'brief_history',
        'video_links',
        'recycling_info',
        'physical_properties',
        'uses',
        'images',
    ];

    protected $casts = [
        'physical_properties'=>'array',
        'images' => 'array',
    ];
}
