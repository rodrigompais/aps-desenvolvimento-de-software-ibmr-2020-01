@extends('layouts.app')

@section('content')

<div class="container">
  @include('includes.alertas')
  <div class="row row-cols-1 row-cols-md-4">
     @foreach ($produto as $row)
     <div class="col mb-4">
      <div class="card h-100">
        <img src="{{asset("storage/{$row->imagem}")}}" class="card-img" class="img-responsive" alt="{{ $row->name }}">
        <div class="card-body">
          <h5 class="card-title">{{$row->name}}</h5>
          <p class="card-text">{{$row->detalhe}}</p>
          <a href="{{ route('carrinho.site', ['slug' => $row->slug]) }}" class="btn btn-primary">Ver Produto</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection

