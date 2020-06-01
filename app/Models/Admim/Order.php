<?php

namespace App\Models\Admim;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'billing_endereco', 'billing_complemento', 'billing_pontoref', 'billing_cidades',
        'billing_estado', 'billing_cep', 'payment_gateway', 'billing_name', 'billing_amount', 'billing_subtotal',
        'billing_total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Produto::class)->withPivot('quantity');
    }
}