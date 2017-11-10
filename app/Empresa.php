<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    public function city(){
        return $this->belongsTo( 'App\Cidade', 'cidade' );
    }

    public function category(){
        return $this->belongsToMany( 'App\Categoria','empresa_categoria' );
    }

}
