<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;
    protected $fillable = [
        'plastic_form_id', 'recycling_organization_id', 'status',
    ];

    public function plasticForm()
    {
        return $this->belongsTo(PlasticForm::class);
    }

    public function recyclingOrganization()
    {
        return $this->belongsTo(RecyclingOrganization::class);
    }
}
