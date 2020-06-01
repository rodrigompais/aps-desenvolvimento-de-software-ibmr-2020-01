<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProduto;
use App\Models\Admim\Produto;
use App\Models\Admim\ProdutoFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    private $produto;

    public function __construct(Produto $produto, ProdutoFoto $produtoFoto)
    {
        $this->produto = $produto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto = $this->produto->paginate();
        return view('admin.produto.index', compact('produto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProduto $request)
    {
        $dataForm = $request->all();
        $dataForm['preco'] = str_replace(",", ".", $dataForm['preco']);

        if ($request->hasFile('imagem') && $request->imagem->isValid()) {
            $dataForm['imagem'] = $request->imagem->store('produtos', 'public');
        }

        if($this->produto->create($dataForm))
            return redirect()
                        ->route('admin.produto.index')
                        ->with('success', 'Produto cadastrado com Sucesso!');
        else
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao cadastrar Produto!')
                        ->withInput();
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = $this->produto->find($id);
        if(!$produto)
            return redirect()->back();

        return view('admin.produto.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = $this->produto->find($id);
        if(!$produto)
            return redirect()->back();

        return view('admin.produto.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$produto = $this->produto->find($id)) {
            return redirect()->back();
        }
        $request['preco'] = str_replace(",", ".", $request['preco']);
        $data = $request->all();

        if ($request->hasFile('imagem') && $request->imagem->isValid()) {

            if(Storage::exists($produto->imagem)) {
                Storage::delete($produto->imagem);
            }

            $data['imagem'] = $request->imagem->store('produtos', 'public');
        }

        if($produto->update($data))
            return redirect()
                        ->route('admin.produto.index')
                        ->with('success', "produto editado com Sucesso!");
        else
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao editar produto!')
                        ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->produto->find($id);
        
        if(!$produto)
            return redirect()->back();
        
            if(Storage::exists($produto->imagem)) {
                Storage::delete($produto->imagem);
            }
        
        if($produto->delete())
            return redirect()
                        ->route('admin.produto.index')
                        ->with('success', "Produto excluido com Sucesso!");
        else
            return redirect()
                        ->back()
                        ->with('error', "Falha ao excluir produto!");
    }
    
    private function imageUpload (Request $request, $imageColumn)
    {
        $imagens = $request->file('imagem');

        $uploadedImagens = [];

        foreach($imagens as $imagem) {
            $uploadedImagens[] = [$imageColumn => $imagem->store('produto', 'public')];
        }

        return $uploadedImagens;
    }
}
