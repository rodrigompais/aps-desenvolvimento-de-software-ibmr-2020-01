<?php

namespace App\Models\Admim;

use Illuminate\Database\Eloquent\Model;

class ProdutoFoto extends Model
{
    protected $fillable = ['imagem'];
    
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
