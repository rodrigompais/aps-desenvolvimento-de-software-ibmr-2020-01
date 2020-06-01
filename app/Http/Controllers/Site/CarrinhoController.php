<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->session()->forget('carrinho');
        $carrinho = session()->has('carrinho') ? session()->get('carrinho') : [];
        //dd($carrinho);
        return view('home.carrinho', compact('carrinho'));
    }

    public function add(Request $request)
    {
        $produto = $request->get('produto');
        
        if (session()->has('carrinho')) {

            $produtos = session()->get('carrinho');
            $produtosSlugs = array_column($produtos, 'slug');

            if(in_array($produto['slug'], $produtosSlugs)) {

                $produtos = $this->produtoAdicionar($produto['slug'], $produto['amount'], $produtos);

                session()->put('carrinho', $produtos);
            } else {

                session()->push('carrinho', $produto);

            }

        } else {

            $produtos[] = $produto;

            session()->put('carrinho', $produtos);
        }

        return redirect()->route('carrinho.site', $produto['slug'])
                        ->with('success', 'Produto Adicionado no Carrinho com Sucesso!');
    }

    public function remove($slug)
    {
        if(!session()->has('carrinho'))
            return redirect()->route('carrinho.index');

        $produtos = session()->get('carrinho');
        //dd($produtos);

        $produtos = array_filter($produtos, function($line) use($slug){
            return $line['slug'] != $slug;
        });

        session()->put('carrinho', $produtos);
        return redirect()->route('carrinho.index');
    }

    public function cancelar()
    {
        session()->forget('carrinho');

        return redirect()->route('carrinho.index')
                        ->with('success', 'Desistencia da Compra Realizada com Sucesso!');
    }

    public function produtoAdicionar($slug, $amount, $produtos)
    {
        $produtos = array_map(function($line) use($slug, $amount){
            if($slug == $line['slug']) {
                $line['amount'] += $amount;
            }
            return $line;
        }, $produtos);

        return $produtos;
    }
}
