@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form id="formcadastrocliente" name="formcadastrocliente" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

                            <div class="col-md-6">
                                <input id="sexo" type="text" class="form-control @error('sexo') is-invalid @enderror" name="sexo" value="{{ old('sexo') }}" required autocomplete="sexo" autofocus>

                                @error('sexo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                            <div class="col-md-6">
                                <input id="telefone" type="number" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone" autofocus>

                                @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="datanascimento" class="col-md-4 col-form-label text-md-right">{{ __('Data de Nascimento') }}</label>

                            <div class="col-md-6">
                                <input id="datanascimento" type="date" class="form-control @error('datanascimento') is-invalid @enderror" name="datanascimento" value="{{ old('datanascimento') }}" required autocomplete="telefone" autofocus>

                                @error('datanascimento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme sua Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button onclick="return validar()" type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/x.y.z/underscore-min.js"></script>
<script type="text/javascript">
    function validar(){
        var email = formcadastrocliente.email.value;
        var senha = formcadastrocliente.senha.value;
        var name = formcadastrocliente.name.value;
        var datanascimento = formcadastrocliente.datanascimento.value;       
        var sexo = formcadastrocliente.sexo.value;
        var telefone = formcadastrocliente.telefone.value;

        if(name == "" || name.length <= 5){
            alert('Preencha o campo nome com no minimo 6 caracteres');
            formcadastrocliente.name.focus();
            return false;
        }

        if(email == "" || email.indexOf('@') == -1 ){
            alert('Preencha o campo E-mail.');
            formcadastrocliente.email.focus();
            return false;
        }

        if(senha == "" || senha.length <= 7){
            alert('Preencha o campo senha com minimo 8 caracteres');
            formcadastrocliente.senha.focus();
            return false;
        }

        

        if(datanascimento == ""){
            alert('Preencha o campo de data de nascimento.');
            formcadastrocliente.datanascimento.focus();
            return false;
        }

        if(sexo == ""){
            alert('Preencha o campo sexo.');
            formcadastrocliente.sexo.focus();
            return false;
        }

        if(telefone == ""){
            alert('Preencha o campo telefone.');
            formcadastrocliente.telefone.focus();
            return false;
        }        
    }
</script>
@endsection
