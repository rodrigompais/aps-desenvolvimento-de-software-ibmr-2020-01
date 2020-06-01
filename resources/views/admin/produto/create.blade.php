@extends('layouts.app-admin')

@section('content')
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
<div class="container">
    <div class="card">
        <div class="card-header">
                <h3 class="text-center">Cadastrar Produto</h3>
        </div>
        <div class="card-body">
        <form action="{{ route('admin.produto.store') }}" class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" class="@error('name') is-invalid @enderror">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Preço</label>
                        <input type="text" name="preco" class="form-control" value="{{old('preco')}}" class="@error('preco') is-invalid @enderror">
                        @error('preco')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Detalhes</label>
                        <input type="text" name="detalhe" class="form-control" value="{{old('detalhe')}}" class="@error('detalhe') is-invalid @enderror">
                        @error('detalhe')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">Descrição</label>
                        <textarea class="form-control" name="descricao" value="{{old('descricao')}}" rows="3" rows="100" class="@error('descricao') is-invalid @enderror"></textarea>
                        @error('descricao')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Imagem do Produto</label>
                        <input type="file" class="form-control-file" name="imagem" class="@error('imagem') is-invalid @enderror">
                        @error('imagem')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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