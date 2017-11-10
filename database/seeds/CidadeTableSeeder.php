<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert( 'INSERT INTO cidades (descricao, created_at, updated_at) VALUES
                            (?, now(), now())', [ 'Bauru' ] );

        DB::insert( 'INSERT INTO cidades (descricao, created_at, updated_at) VALUES
                            (?, now(), now())', [ 'São Paulo' ] );

        DB::insert( 'INSERT INTO cidades (descricao, created_at, updated_at) VALUES
                            (?, now(), now())', [ 'Manaus' ] );

        DB::insert( 'INSERT INTO cidades (descricao, created_at, updated_at) VALUES
                            (?, now(), now())', [ 'Fortaleza' ] );
    }
}
