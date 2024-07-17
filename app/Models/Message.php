<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'user_id',
        'recycling_organization_id',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recyclingOrganization()
    {
        return $this->belongsTo(RecyclingOrganization::class);
    }
    public function plasticUser()
    {
        return $this->belongsTo(User::class, 'plastic_user_id');
    }

}
