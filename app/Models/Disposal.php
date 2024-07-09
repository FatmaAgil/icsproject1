<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposal extends Model
{
    use HasFactory;
    protected $fillable = [
        'plastic_id',
        'user_id',
        'disposed_at',
        'points',
    ];
    public function plastic()
    {
        return $this->belongsTo(Plastic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
