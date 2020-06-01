<?php

namespace App\Models\Admim;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    protected $fillable = ['reference','billing_endereco', 'billing_complemento', 'billing_pontoref',
    'billing_cidade', 'billing_estado', 'billing_cep', 'items'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
