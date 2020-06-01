<?php

use App\Models\Site\Produto;
use Illuminate\Database\Seeder;

class ProdutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create([
            'name'          => 'Smartphone Samsung Galaxy A10',
            'detalhe'       => 'Smartphone Samsung Galaxy A10 Preto 32GB, Tela Infinita de 6.2", Câmera Traseira 13MP, Dual Chip, Android 9.0 e Processador Octa-Core',
            'preco'         => 849.00,
            'descricao'   => 'Uma tela com melhor visualização. Aproveite a tela HD Plus de 6,2 polegadas para assitir aos seus Conteúdos no celular. Mergulhe nos 
            seus Conteúdos e jogos favoritos com o Display Infinito do seu Galaxy A10.',
            
        ]);
        Produto::create([
            'name'          => 'Smartphone Samsung Galaxy A20',
            'detalhe'       => 'Smartphone Samsung Galaxy A20 Preto 32GB, Tela Infinita de 6.2", Câmera Traseira 13MP, Dual Chip, Android 9.0 e Processador Octa-Core',
            'preco'         => 849.00,
            'descricao'   => 'Uma tela com melhor visualização. Aproveite a tela HD Plus de 6,2 polegadas para assitir aos seus Conteúdos no celular. Mergulhe nos 
            seus Conteúdos e jogos favoritos com o Display Infinito do seu Galaxy A20.',
            
        ]);
        Produto::create([
            'name'          => 'Smartphone Samsung Galaxy A30',
            'detalhe'       => 'Smartphone Samsung Galaxy A30 Preto 32GB, Tela Infinita de 6.2", Câmera Traseira 13MP, Dual Chip, Android 9.0 e Processador Octa-Core',
            'preco'         => 849.00,
            'descricao'   => 'Uma tela com melhor visualização. Aproveite a tela HD Plus de 6,2 polegadas para assitir aos seus Conteúdos no celular. Mergulhe nos 
            seus Conteúdos e jogos favoritos com o Display Infinito do seu Galaxy A30.',
            
        ]);
    }
}
