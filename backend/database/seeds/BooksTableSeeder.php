<?php

use App\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'Livro 1',
            'author' => 'Reginaldo Filho',
            'image' => 'imagem.jpg',
            'description' => 'Descrição Livro 1',
            'link' => 'http://www.livro.com.br/1/livro',
            'category_id' => 1
        ]);

        Book::create([
            'title' => 'Livro 2',
            'author' => 'Reginaldo Filho2',
            'image' => 'imagem2.jpg',
            'description' => 'Descrição Livro 2',
            'link' => 'http://www.livro.com.br/2/livro',
            'category_id' => 2
        ]);

        Book::create([
            'title' => 'Livro 3',
            'author' => 'Reginaldo Filho3',
            'image' => 'imagem3.jpg',
            'description' => 'Descrição Livro 3',
            'link' => 'http://www.livro.com.br/3/livro',
            'category_id' => 3
        ]);

        Book::create([
            'title' => 'Livro 4',
            'author' => 'Reginaldo Filho4',
            'image' => 'imagem4.jpg',
            'description' => 'Descrição Livro 4',
            'link' => 'http://www.livro.com.br/4/livro',
            'category_id' => 4
        ]);

        Book::create([
            'title' => 'Livro 5',
            'author' => 'Reginaldo Filho5',
            'image' => 'imagem5.jpg',
            'description' => 'Descrição Livro 5',
            'link' => 'http://www.livro.com.br/5/livro',
            'category_id' => 5
        ]);

        Book::create([
            'title' => 'Livro 6',
            'author' => 'Reginaldo Filho6',
            'image' => 'imagem6.jpg',
            'description' => 'Descrição Livro 6',
            'link' => 'http://www.livro.com.br/6/livro',
            'category_id' => 6
        ]);

        Book::create([
            'title' => 'Livro 7',
            'author' => 'Reginaldo Filho7',
            'image' => 'imagem7.jpg',
            'description' => 'Descrição Livro 7',
            'link' => 'http://www.livro.com.br/7/livro',
            'category_id' => 1
        ]);
    }
}
