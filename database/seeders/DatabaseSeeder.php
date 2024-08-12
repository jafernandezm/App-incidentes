<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'warrior',
            'email' => 'gonter866@gmail.com',
           'password' => bcrypt('password')
       ]);
      $tipos=[
         //nombre, descripcion
          [
            'nombre' =>'urlInfectada',
           'descripcion'=> 'buscar'
          ],
         [
            'nombre' =>'htmlInfectado',
           'descripcion'=> 'buscar'
         ],
          [
            'nombre' =>'dorksPasivo',
            'descripcion'=> 'buscar'
          ],
          [
            'nombre' =>'dorksActivo',
            'descripcion'=> 'buscar'
          ],
          [
             'nombre' =>'NDSW',
            'descripcion'=> 'buscar'
          ]
        
      ]; // urlInfectada, htmlInfectado, dorks, NDSW
      
      \App\Models\Tipo::factory()->createMany($tipos);
      //tipo_id, descripcion, fecha, contenido, 
      //'urlInfectada', 'htmlInfectado', 'dorksPasivo', 'dorksActivo', 'NDSW'
      $incidentes = [
          [
              'tipo_id' => 1,
              'contenido' => 'https://wjk.hfiiiqkp.shop',
              'descripcion' => 'ataque seo japones',
              'fecha' => '2024-06-22'
          ],
          [
              'tipo_id' => 1,
              'contenido' => 'https://ner.arcdycvz.shop',
              'descripcion' => 'ataque seo japones',
              'fecha' => '2024-06-22'
          ],
          [
              'tipo_id' => 1,
              'contenido' => 'https
              ://aaj.toirifiy.top',
              'descripcion' => 'ataque seo japones',
              'fecha' => '2024-06-22'
          ],
          [
              'tipo_id' => 1,
              'contenido' => 'https://www.umivo.net',
              'descripcion' => 'ataque seo japones',
              'fecha' => '2024-06-22'
          ],
          
          [
              'tipo_id' => 2,
              'contenido' => '<html lang="ja"',
              'descripcion' => 'HTML infectado',
              'fecha' => '2024-06-22'
          ],
          [
              'tipo_id' => 2,
              'contenido' => '<meta http-equiv="refresh" ',
              'descripcion' => 'HTML infectado',
              'fecha' => '2024-06-22'
          ],
          [
              'tipo_id' => 3,
              'contenido' => 'site:gob.bo japan',
              'descripcion' => 'dorksPasivo',
              'fecha' => '2024-06-22'
          ],
          [
              'tipo_id' => 4,
              'contenido' => 'japan',
              'descripcion' => 'dorksActivo',
              'fecha' => '2024-06-22'
          ],
          [
              'tipo_id' => 5,
              'contenido' => '"ndsw===undefined"',
              'descripcion' => 'NDSW',
              'fecha' => '2024-06-22'
          ]
          ,
          [
              'tipo_id' => 5,
              'contenido' => '"ndsw"',
              'descripcion' => 'NDSW',
              'fecha' => '2024-06-22'
          ],
            [
                'tipo_id' => 5,
                'contenido' => 'ndsw = true',
                'descripcion' => 'NDSW',
                'fecha' => '2024-06-22'
            ]
        ];
        \App\Models\Incidente::factory()->createMany($incidentes);
    }
}
