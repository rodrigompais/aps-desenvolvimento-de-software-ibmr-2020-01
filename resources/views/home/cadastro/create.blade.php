@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body"> 
            <h4 class="text-center">Preencha o formulário abaixo para realizar o seu cadastro</h4>
            <form name="formcadastrocliente" method="POST" action="{{ route('register') }}">
              @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">E-mail</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Senha</label>
                    <input type="password" name="senha" class="form-control">
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Seu nome e sobrenome</label>
                      <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Data de Nascimento</label>
                      <input type="date" name="datanascimento" class="form-control" value="{{ old('datanascimento') }}">
                    </div>
                  </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Sexo</label>
                        <select id="inputState" name="sexo" class="form-control" value="{{ old('sexo') }}">
                          <option selected></option>
                          <option>Masculino</option>
                          <option>Feminino</option>
                        </select>
                    </div>
                  <div class="form-group col-md-6">
                    <label for="inputCity">Telefone</label>
                    <input type="text" name="telefone" class="form-control" value="{{ old('telefone') }}">
                  </div>                  
                </div>                
                <button type="submit" onclick="return validar()" class="btn btn-success">Crie o seu cadastro</button>
                <small id="emailHelp" class="form-text text-muted">Fique tranquilo, nosso site é seguro!</small>
              </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function validar(){
        var email = formcadastrocliente.email.value;
        var senha = formcadastrocliente.senha.value;
        var nome = formcadastrocliente.nome.value;
        var datanascimento = formcadastrocliente.datanascimento.value;       
        var sexo = formcadastrocliente.sexo.value;
        var telefone = formcadastrocliente.telefone.value;

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

        if(nome == "" || nome.length <= 5){
            alert('Preencha o campo nome com no minimo 6 caracteres');
            formcadastrocliente.nome.focus();
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