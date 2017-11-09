<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call( 'CategoriaTableSeeder' );
    }
}

class CategoriaTableSeeder extends Seeder{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: Implement run() method.
        DB::insert('INSERT INTO categorias ( descricao ) VALUES ( ? )', array( 'Auto' ));
        DB::insert('INSERT INTO categorias ( descricao ) VALUES ( ? )', array( 'Beauty and Fitness' ));
        DB::insert('INSERT INTO categorias ( descricao ) VALUES ( ? )', array( 'Entertainment' ));
        DB::insert('INSERT INTO categorias ( descricao ) VALUES ( ? )', array( 'Food and Dining' ));
        DB::insert('INSERT INTO categorias ( descricao ) VALUES ( ? )', array( 'Health' ));
        DB::insert('INSERT INTO categorias ( descricao ) VALUES ( ? )', array( 'Sports' ));
        DB::insert('INSERT INTO categorias ( descricao ) VALUES ( ? )', array( 'Travel' ));
    }
}
