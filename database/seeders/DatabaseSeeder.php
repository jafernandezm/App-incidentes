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

       \App\Models\Sitios::factory()->create(
           [
                'url' => 'https://www.cmt.gob.bo/',
                'nombre' => 'Pasivo 1',
                'estado' => 'pasivo',
           ]
       );
        // url ,tipo, fecha_adicion
         \App\Models\Dorks::factory()->create(
              [
                'dork' => 'site:gob.bo japan',
                'fecha' => '2024-06-22'
              ]
         );
        // url ,tipo, fecha_adicion
        $listanegra = [
          [
              'url' => 'https://wjk.hfiiiqkp.shop',
              'tipo' => 'ataque seo japones',
              'fecha' => '2024-06-22'
          ],
          [
              'url' => 'https://ner.arcdycvz.shop',
              'tipo' => 'ataque seo japones',
              'fecha' => '2024-06-22'
          ],
          //https://aaj.toirifiy.top
          [
              'url' => 'https://aaj.toirifiy.top',
              'tipo' => 'ataque seo japones',
              'fecha' => '2024-06-22'
          ],
          //https://www.umivo.net
          [
              'url' => 'https://www.umivo.net',
              'tipo' => 'ataque seo japones',
              'fecha' => '2024-06-22'
          ],
          //https://ginzo.jp
          [
            'url' => 'https://ginzo.jp',
            'tipo' => 'ataque seo japones',
            'fecha' => '2024-06-22'
          ]
      ];

      \App\Models\ListaNegra::factory()->createMany($listanegra);

      // escaneo_id, html_infectado,descripcion
      $htmlInfectado = [
          [
            // 'lang="ja"',
              'html_infectado' => '<html lang="ja"',
              'descripcion' => 'ataque seo japones'
          ],
          [
            //  'meta http-equiv="refresh"',
              'html_infectado' => '<meta http-equiv="refresh" ',
              'descripcion' => 'ataque seo japones'
          ]
      ];
      \App\Models\Html_infectado::factory()->createMany($htmlInfectado);
    }
}
