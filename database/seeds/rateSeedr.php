<?php

use App\Models\User;
use App\Models\Therapist;
use App\Models\TherapistRate;
use Illuminate\Database\Seeder;
use App\Models\SessionTherapist;

class rateSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::select('id')->get();

        $Therapists = Therapist::select('id')->get();

        TherapistRate::truncate();
        SessionTherapist::truncate();
        
        foreach ($users as $user) {
            foreach ($Therapists as $Therapist) {
                if(rand(0,1)){

                      TherapistRate::create(
                    [
                        'user_id'=>$user->id,
                        'therapist_id'=>$Therapist->id,
                        'rate'=>rand(0,5)
                    ]
                ); 
                SessionTherapist::create(
                    [
                        'user_id'=>$user->id,
                        'therapist_id'=>$Therapist->id,
                        
                    ]
                ); 

                

                }
             
            }
        }
    }
}
