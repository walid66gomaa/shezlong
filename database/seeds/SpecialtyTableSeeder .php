<?php

use App\Models\User;
use App\Models\Specialty;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class SpecialtyTableSeeder.
 */
class SpecialtyTableSeeder extends Seeder
{
    
    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {

        // Add the master administrator, Specialty id of 1
        $specialties=['مشاكل الأطفال','مشاكل المراهقة','الاكتئاب','الادمان'];
        Specialty::truncate();
      foreach($specialties as $Specialty )
      {

     
        Specialty::create([
             'specialtyName'=>$Specialty,
           
        ]);

        }
$users=User::select('id')->get();

DB::statement('delete from specialty_therapist');
       foreach($users as $user)
       {
  $count=rand(0,sizeof($specialties));

                for($i=0 ;$i<$count;$i++ )
                {

                    DB::insert('insert into specialty_therapist (specialty_id, therapist_id) values (?, ?)', [$user->id, $i]);
                }

       }
    
    }
}
