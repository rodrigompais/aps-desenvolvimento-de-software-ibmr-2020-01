<?php

namespace App\Models\Admim;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Produto extends Model
{
    protected $fillable = ['name', 'slug', 'preco','detalhe', 'descricao','imagem', 'quantity'];

    use HasSlug;
    
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function imagens ()
    {
        return $this->hasMany(ProdutoFoto::class);

    }
}
