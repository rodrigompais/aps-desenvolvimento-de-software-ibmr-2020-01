
@extends('layouts.app-admin')

@section('content')

<div class="container">
    <div class="card mb-12" style="max-width: 100%;">
        <div class="row no-gutters">
          <div class="col-md-3">
            <img src="{{asset("storage/{$produto->imagem}")}}" class="card-img" alt="{{ $produto->name }}">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><strong>Nome: </strong>{{$produto->name}}</h5>
              <p class="card-text"><strong>Preço R$: </strong>{{ number_format($produto->preco, 2,',','') }}</p>
              <p class="card-text"><strong>Detalhe: </strong>{{$produto->detalhe}}</p>
              <p class="card-text"><strong>Descrição: </strong>{{$produto->descricao}}</p>
              <div class="text-right">                
                  <form action="{{ route('admin.produto.destroy', $produto->id) }}" method="post">
                      @csrf
                      @method("DELETE")
                      <a href="{{ route('admin.produto.index') }}" type="submit" class="btn btn-primary btn-sm">LISTAR</a>
                      <a href="{{ route('admin.produto.edit', $produto->id) }}" type="submit" class="btn btn-warning btn-sm">EDITAR</a>
                      <button type="submit" class="btn btn-danger btn-sm">EXCLUIR</button>
                  </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@stop