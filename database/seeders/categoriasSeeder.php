<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class categoriasSeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            ['nome' => 'Feminino', 'imagem' => 'admin/images/categorias/vestido15-20-30.png'],
            ['nome' => 'Masculino', 'imagem' => 'admin/images/categorias/captura-de-tela-de-2022-11-01-13-35-09.png'],
            ['nome' => 'Acessórios', 'imagem' => 'admin/images/categorias/captura-de-tela-de-2022-11-17-16-18-35.png'],
            ['nome' => 'Infantil', 'imagem' => null],
            ['nome' => 'Esportivo', 'imagem' => null],
            ['nome' => 'Vintage', 'imagem' => null],
        ];

        foreach ($categorias as $cat) {
            Categoria::updateOrCreate(
                ['nome' => $cat['nome'], 'parent_id' => null],
                ['imagem' => $cat['imagem'], 'parent_id' => null]
            );
        }

        $feminino = Categoria::query()->where('nome', 'Feminino')->whereNull('parent_id')->first();
        $infantil = Categoria::query()->where('nome', 'Infantil')->whereNull('parent_id')->first();

        if ($feminino) {
            Categoria::updateOrCreate(
                ['nome' => 'Bolsas', 'parent_id' => $feminino->id_catg],
                ['imagem' => null]
            );
        }

        if ($infantil) {
            Categoria::updateOrCreate(
                ['nome' => 'Brinquedos', 'parent_id' => $infantil->id_catg],
                ['imagem' => null]
            );
        }
    }
}
