<?php

namespace App\Models;

use App\Models\Therapist;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = [
        'specialtyName',
    ];

    
    public function therapists()
    {
        return $this->belongsToMany(Therapist::class, 'specialty_therapist')->withPivot('therapist_id');
    }
}
