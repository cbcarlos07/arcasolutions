<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('INSERT INTO categorias (descricao, created_at, updated_at) VALUES (?, now(), now())', ['Auto']);
        DB::insert('INSERT INTO categorias (descricao, created_at, updated_at) VALUES (?, now(), now())', ['Beauty and Fitness']);
        DB::insert('INSERT INTO categorias (descricao, created_at, updated_at) VALUES (?, now(), now())', ['Entertainment']);
        DB::insert('INSERT INTO categorias (descricao, created_at, updated_at) VALUES (?, now(), now())', ['Food and Dining']);
        DB::insert('INSERT INTO categorias (descricao, created_at, updated_at) VALUES (?, now(), now())', ['Health']);
        DB::insert('INSERT INTO categorias (descricao, created_at, updated_at) VALUES (?, now(), now())', ['Sports']);
        DB::insert('INSERT INTO categorias (descricao, created_at, updated_at) VALUES (?, now(), now())', ['Travel']);
    }
}
