<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecyclingOrganization extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'requirements',
        'latitude',
        'longitude',
        'email',
    ];
    public function connections()
    {
        return $this->hasMany(Connection::class);
    }

}
