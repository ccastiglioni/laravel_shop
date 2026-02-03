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
        ];

        foreach ($categorias as $cat) {
            Categoria::updateOrCreate(
                ['nome' => $cat['nome']],
                ['imagem' => $cat['imagem']]
            );
        }
    }
}
