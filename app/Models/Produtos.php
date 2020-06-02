<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    //
    protected $fillable = [
        'sku', 'nome', 'descricao','preco','qtd','imagem',
    ];    
}
