<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {/*
       DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Acre', 'AC' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Alagoas', 'AL' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Amapá', 'AP' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Amazonas', 'AM' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Bahia', 'BA' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Ceará', 'CE' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Distrito Federal', 'DF' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Espírito Santo', 'ES' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Goiás', 'GO' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Maranhão', 'MA' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Mato Grosso', 'MT' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Mato Grosso do Sul', 'MS' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Minas Gerais', 'MG' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Pará', 'PA' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Paraíba', 'PB' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Paraná', 'PR' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Pernambuco', 'PE' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Piauí', 'PI' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Rio de Janeiro', 'RJ' ) );*/

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Rio Grande do Norte', 'RN' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Rio Grande do Sul', 'RS' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Rondônia', 'RO' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Roraima', 'RR' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Santa Catarina', 'SC' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'São Paulo', 'SP' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Sergipe', 'SE' ) );

        DB::insert( "INSERT INTO estados (descricao, sigla, created_at, updated_at)
                            VALUES ( ?,?, now(), now() )", array( 'Tocantins', 'TO' ) );
    }
}
