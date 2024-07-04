<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'subject', 'message'];
    protected $guarded = [];

    public function reply()
    {
        return $this->hasOne(Reply::class, 'contact_message_id');
    }
}

