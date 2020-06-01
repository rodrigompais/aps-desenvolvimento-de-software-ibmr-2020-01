@extends('layouts.app-admin')

@section('content')
<div class="container">
  @include('includes.alertas')
  <div class="card">
    <div class="card-body">
        <div class="col-12 text-center">
            <h2>Pedidos Recebidos</h2>
        </div>      
      <div class="row justify-content-center">
          <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Cliente</th>
                  <th scope="col">Data do Pedido</th>
                  <th scope="col">Nº Pedido</th>
                  <th scope="col">Produto</th>
                  <th scope="col">Quantidades</th>
                  <th scope="col">Valor Total</th>
                  {{-- <th style="width: 300px" class="text-center">Ações</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $key => $order)
                    @php $items = unserialize($order->items); @endphp
                        @foreach ($items as $item)
                            <tr>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->created_at}}</td>                
                                <td>{{$order->reference}}</td>
                                <td>{{$item['name']}}</td>
                                <td>{{$item['amount']}}</td>
                                <td>R$ {{ number_format($item['preco'] * $item['amount'], 2, ',', '.') }}</td>
                                {{-- <td>
                                    <div class="text-center">
                                    <a href="{{ route('admin.produto.show', $item->reference) }}" type="submit" class="btn btn-primary btn-sm">VISUALIZAR</a>
                                    <a href="{{ route('admin.produto.edit', $item->reference) }}" type="submit" class="btn btn-warning btn-sm">EDITAR</a>
                                    <a href="{{ route('admin.produto.destroy', $item->reference) }}" type="submit" class="btn btn-danger btn-sm">EXCLUIR</a>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                @endforeach
              </tbody>
            </table>
            <div class="col-12">
                <hr>
                {{$orders->links()}}
            </div>
      </div>
    </div>
  </div>
</div>
@endsection
