@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
                <h3 class="text-center">Cadastrar Produto</h3>
        </div>
        <div class="card-body">
        <form action="{{ route('admin.produto.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Name</label>
                    <input type="text" name="name" value="{{$produto->name}}" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Preço</label>
                        <input type="text" name="preco" value="{{number_format($produto->preco, 2,',','')}}" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Detalhes</label>
                        <input type="text" name="detalhe" value="{{$produto->detalhe}}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Descrição</label>
                        <textarea class="form-control" name="descricao" rows="5" 
                        rows="100">{{$produto->descricao}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Imagem do Produto</label>
                        <input type="file" class="form-control-file" name="imagem">
                      </div>
                </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Gravar</button>
                    <a href="{{ route('admin.produto.index') }}" type="submit" class="btn btn-danger">Cancelar</a>
                  </div>
            </form>
        </div>
    </div>
  </div>
</div>
@stop