<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Publicacao;
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
        //factory(App\User::class,29)->create();
        User::create([
            'name'      => 'Uendson',
            'email'     => 'uendson@email.com',
            'permissao' => 'administrador',
            'password'  => Hash::make('admin123'),
        ]);

        User::create([
            'name'      => 'Cesar',
            'email'     => 'cesar@email.com',
            'permissao' => 'usuario',
            'password'  => Hash::make('user123'),
        ]);

        foreach (range(1,10) as $i) {
            User::create([
                'name'      => $faker->word(),
                'email'     => $faker->email(),
                'permissao' => 'usuario',
                'password'  => $faker->password(),//Hash::make('admin'),
            ]);
        }
        
        $indiceGeral = 1;

        foreach (range(1,10) as $i) {

            $imgTemp = $faker->image('storage');
            
            $nomeImg = "publicacoes{$indiceGeral}.jpg";

            rename($imgTemp, "storage/app/public/{$nomeImg}");             

            Publicacao::create([
                'idUser'        => '1',
                'titulo'        => $faker->word(),
                'conteudo'      => $faker->realText(1000, 2),  
                'imagem'        => $nomeImg,          
            ]);
            $indiceGeral++;
        }

        foreach (range(1,10) as $i) {
            $imgTemp = $faker->image('storage');
            
            $nomeImg = "publicacoes{$indiceGeral}.jpg";

            rename($imgTemp, "storage/app/public/{$nomeImg}");  

            Publicacao::create([
                'idUser'        => '2',
                'titulo'        => $faker->word(),
                'conteudo'      => $faker->realText(1000, 2), 
                'imagem'        => $nomeImg,            
            ]);
            $indiceGeral++;
        }

        foreach (range(1,10) as $i) {
            $imgTemp = $faker->image('storage');
            
            $nomeImg = "publicacoes{$indiceGeral}.jpg";

            rename($imgTemp, "storage/app/public/{$nomeImg}");  

            Publicacao::create([
                'idUser'        => '3',
                'titulo'        => $faker->word(),
                'conteudo'      => $faker->realText(1000, 2),  
                'imagem'        => $nomeImg,           
            ]);
            $indiceGeral++;
        }
    }
}
