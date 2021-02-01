<?php

namespace App\Models;

use App\Models\Specialty;
use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    protected $fillable = [
        'name', 'email', 'password','slug','price','rate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function specialties()
    {
        
        return $this->belongsToMany(Specialty::class, 'specialty_therapist')->withPivot('specialty_id');
    }


    public function rates()
    {
        return $this->hasMany(TherapistRate::class);
    }
     public function rates_count()
    {
     return  $this->rates()->count();
    }

    public function rates_average()
    {
     return $this->rates()->avg('rate');
    }

    public function sessions()
    {
        return $this->hasMany(SessionTherapist::class);
    }

     public function sessions_count()
    {
     return  $this->sessions()->count();
    }

   

}
