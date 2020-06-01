@extends('layouts.app')

@section('content')

<div class="container">
  @include('includes.alertas')
<div class="card">
  
    <div class="card-body">
      <div class="row">
        <h5 class="text-center">Carrinho de Compras</h5>
      </div>
      <div class="row justify-content-center">
          @if ($carrinho)
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Produto</th>
                <th style="width: 150px">Preço</th>
                <th scope="col">Quantidade</th>
                <th style="width: 150px">Subtotal</th>
                <th style="width: 100px" class="text-center">Ações</th>
              </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
              @foreach ($carrinho as $item)
                  <tr>                 
                      <td>{{$item['name']}}</td>
                      <td>R$ {{number_format($item['preco'], 2,',','.')}}</td>
                      <td>{{$item['amount']}}</td>
                      @php
                          $subtotal = $item['preco'] * $item['amount'];
                          $total += $subtotal;
                      @endphp
                      <td>R$ {{number_format($subtotal, 2,',','.')}}</td>
                      <td>
                          <div class="text-center">
                            <a href="{{ route('carrinho.remove', $item['slug']) }}" 
                              type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-2x"></i></a>
                          </div>
                      </td>
                  </tr> 
              @endforeach
              <td colspan="3">Total: </td>
              <td colspan="2">R$ {{number_format($total, 2,',','.')}}</td>
            </tbody>
          </table>
          <hr>
          <div class="col-md-12">
            <a href="{{route('checkout.index')}}" class="btn btn-lg btn-success float-right">Concluir Compra</a>
            <a href="{{route('home.site')}}" class="btn btn-lg btn-primary float-left">Continuar Comprando</a>
            <a href="{{route('carrinho.cancelar')}}" class="btn btn-lg btn-danger float-left">Cancelar Compra</a>
          </div>
          @else
              <div class="alert alert-warning">Carrinho Vazio...</div>
          @endif
      </div>
    </div>
  </div>
</div>
@endsection
