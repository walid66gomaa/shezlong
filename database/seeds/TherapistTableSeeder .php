<?php

use App\Models\Therapist;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

/**
 * Class TherapistTableSeeder.
 */
class TherapistTableSeeder extends Seeder
{
    
    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {

        // Add the master administrator, Therapist id of 1
        Therapist::truncate();
        Therapist::create([
            
             'name' =>'بسمه محمود' ,
             'img'=>'71005-8d1c0f5cb4f2b0b5d729e07b81a07b48.jpg',
             'slug'=>Str::slug(  'basma ', '_', 'en'),
             'title'=> "معالج نفسي",
             'price'=> "150",
             'rate'=> "4.5",
             'country'=> 'مصر',

            'email'             => 'walid@walid.com',
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        Therapist::create([
            'name'=>'د حسين حج حسين',
            'img'=>'0e2fd49405cc114a1af3a9f7d9d3e091.png',
             'slug'=> Str::slug(  'hussin ahmed' , '_', 'en'),
             'title'=> "دكتوراه الصحة النفسية والعلاج النفسي",
             'price'=> "550",
             'rate'=> "4",
             'country'=>'مصر',
             'active'=>'0',
            'email'             => 'walid@Ziada.com',
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

       
    }
}
