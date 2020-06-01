@extends('layouts.app')

@section('content')
<div class="container">
  @include('includes.alertas')
  <div class="card mb-12" style="max-width: 100%;">
      <div class="row no-gutters">
        <div class="col-md-3">
          <img src="{{asset("storage/{$produto->imagem}")}}" class="card-img" alt="{{ $produto->name }}">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><strong>Nome: </strong>{{$produto->name}}</h5>
            <p class="card-text"><strong>Preço R$: </strong>{{ number_format($produto->preco, 2,',','') }}</p>
            {{-- <p class="card-text"><strong>Detalhe: </strong>{{$produto->detalhe}}</p> --}}
            <p class="card-text"><strong>Descrição: </strong>{{$produto->descricao}}</p>
            <hr>
            <div class="produtc-add">
            <form action="{{ route('carrinho.add') }}" method="post">
                @csrf
              <input type="hidden" name="produto[id]" value="{{$produto->id}}">
              <input type="hidden" name="produto[name]" value="{{$produto->name}}">
                <input type="hidden" name="produto[preco]" value="{{$produto->preco}}">
                <input type="hidden" name="produto[slug]" value="{{$produto->slug}}">
                <div class="form-group">
                  <label>Quantidade</label>
                  <input type="number" name="produto[amount]" min="1" max="100" value="1" class="form-control col-md-2">
                </div>
                <button href="#" class="btn btn-success">COMPRAR</button>
              </form>
            </div>{{-- 
            
            <div class="text-right">                
              <a href="#" class="btn btn-success">COMPRAR</a>
            </div> --}}
          </div>
        </div>
      </div>
  </div>
</div>
@endsection

