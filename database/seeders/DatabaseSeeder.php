<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $gender = $faker->randomElement(['male','female']);
        foreach (range(1,100) as $index){
            DB::table('pacientes')->insert([
                // 'matricula' => $faker->numberBetween($min = 2110000, $max = 2210000),
                //nombre => $faker->name($gender),
                'nombre' => $faker->firstName($gender = 'male'|'female'),
                'apellidop' => $faker->lastName,
                'apellidom' => $faker->lastName,
                'sexo' => $faker->randomElement($array = array('F', 'M')),
                'edad' => $faker->numberBetween($min = 1, $max = 99),
                'tiposangre' => $faker->randomElement($array = array('A positivo (A+)',
                'A negativo (A-)',
                'B positivo (B+)',
                'B negativo (B-)',
                'AB positivo (AB+)',
                'AB negativo (AB-)',
                'O positivo (O+)',
                'O negativo (O-)')),
                'telefono'=>$faker->numberBetween($max = 10),
                'correo' =>$faker->email,
                // 'pass'=> $faker->bothify('utvt##??'),
                'created_at'=> $faker->dateTime($max='now', $timezone=null),
                'updated_at'=> $faker->dateTime($max='now', $timezone=null),
            ]);
        }


 /*        DB::table('medicos')->insert([
            'nombre' => $faker->firstName($gender = 'male'|'female'),
            'appaterno' => $faker->lastName,
            'apmaterno' => $faker->lastName,
            'sexo' => $faker->randomElement($array = array('F', 'M')),
            'edad' => $faker->numberBetween($min = 1, $max = 2),
            'telefono'=>$faker->numberBetween($max = 10),
            'correo' =>$faker->email,
            'password'=> $faker->bothify('utvt##??'),
            'calle'=>  $faker->lastName,
            'numint'=>  $faker->lastName,
            'colonia'=>  $faker->lastName,
            'img'=>  null,
            'idmun'=>1,
            'idesp'=>1,
            'numext'=>  $faker->numberBetween($min = 1, $max = 2),
            'hora_entrada'=>  "00:00:00",
            'hora_salida'=>  "00:00:00",
            'created_at'=> $faker->dateTime($max='now', $timezone=null),
            'updated_at'=> $faker->dateTime($max='now', $timezone=null), */


          /*   foreach (range(1,50) as $index){
                DB::table('citas')->insert([
                    
                    'idpaciente' => $faker->randomElement($array = array('1','2','3','4','5','6','7','8','9','10')),
                    'idesp' => $faker->randomElement($array = array('1','2','3')),
                    'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'created_at'=> $faker->dateTime($max='now', $timezone=null),
                    'updated_at'=> $faker->dateTime($max='now', $timezone=null),
                ]);
        }  */
}
}