<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admim\UserOrder;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class CheckoutController extends Controller

{
    public function index()
    {
    	if(!auth()->check()) {
			return redirect()->route('login');
	    }

	    if(!session()->has('carrinho')) return redirect()->route('home.site');

		$cartItems = array_map(function($line){
			return $line['amount'] * $line['preco'];
		}, session()->get('carrinho'));

		$cartItems = array_sum($cartItems);

	    return view('home.checkout', compact('cartItems'));
    }

	public function proccess(Request $request)
	
    {
        $user = auth()->user();
        $reference = Uuid::uuid4();        
        $cartItems = session()->get('carrinho');

        foreach ($cartItems as $item){
            $reference;
            $item['name'];
            $item['preco'];
            $item['amount'];
        };

        $userOrder = [
            'reference' => $reference,
            'billing_endereco' =>$request['billing_endereco'],
            'billing_complemento' =>$request['billing_complemento'],
            'billing_pontoref' =>$request['billing_pontoref'],
            'billing_cidade' =>$request['billing_cidade'],
            'billing_estado' =>$request['billing_estado'],
            'billing_cep' =>$request['billing_cep'],
            'items' => serialize($cartItems)
        ];

		$userOrder = $user->orders()->create($userOrder);

		session()->forget('carrinho');
		
		return redirect()->route('home.site')
                        ->with('success', 'Pedido Realziado com Sucesso!');

    }
}