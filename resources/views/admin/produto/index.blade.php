@extends('layouts.app-admin')

@section('content')
<div class="container">
  @include('includes.alertas')
  <div class="card">
    <div class="card-body">
      <div class="row form-group">
      <a href="{{ route('admin.produto.create') }}" type="button" 
      class="btn btn-primary">CADASTRAR PRODUTO</a>
      </div>
      <div class="row justify-content-center">
          <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Cod.</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Preço</th>
                  <th style="width: 300px" class="text-center">Ações</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($produto as $item)
                  <tr>                
                      <td>{{$item->id}}</td>
                      <td>{{$item->name}}</td>
                      <td>R$ {{ number_format($item->preco, 2,',','') }}</td>
                      <td>
                        <div class="text-center">
                          <a href="{{ route('admin.produto.show', $item->id) }}" type="submit" class="btn btn-primary btn-sm">VISUALIZAR</a>
                          <a href="{{ route('admin.produto.edit', $item->id) }}" type="submit" class="btn btn-warning btn-sm">EDITAR</a>
                          <a href="{{ route('admin.produto.destroy', $item->id) }}" type="submit" class="btn btn-danger btn-sm">EXCLUIR</a>
                        </div>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
      </div>
    </div>
  </div>
</div>
@endsection
