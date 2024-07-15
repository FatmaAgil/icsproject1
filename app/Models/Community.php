<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
    ];
    public static function createCommunity($name, $description, $image)
    {
        $Community = new self();
        $Community ->name = $name;
        $Community ->description = $description;
        $Community ->image = $image;
        $Community ->save();
        return $Community;
}
}
