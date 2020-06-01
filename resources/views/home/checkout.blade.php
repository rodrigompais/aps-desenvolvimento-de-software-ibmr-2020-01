@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
        <form name="formcheckout" action="{{route('checkout.proccess')}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-4 order-md-2 mb-4">
{{--                     <h4 class="d-flex justify-content-between align-items-center mb-3">
                      <span class="text-muted">Produtos do Carrinho</span>
                      @if (session()->has('carrinho'))
                        <span class="badge badge-secondary badge-pill">{{count(session()->get('carrinho'))}}</span>
                      @endif
                    </h4> --}}
                    {{-- <ul class="list-group mb-3">
                      @php $total = 0; @endphp
                        @foreach ($cartItems as $item)
                          <li class="list-group-item d-flex justify-content-between lh-condensed">
                              <div>
                                <h6 name="carrinho['name']" class="my-0">{{$item['name']}}</h6>
                                <small name="carrinho['amount']" class="text-muted">{{$item['amount']}}</small>
                              </div>
                              @php
                                  $subtotal = $item['preco'] * $item['amount'];
                                  $total += $subtotal;
                              @endphp
                              <span name="billing_subtotal" class="text-muted">R$ {{number_format($subtotal, 2,',','.')}}</span>
                          </li>
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between">
                          <span>Total</span>
                          <strong name="billing_total">R$ {{number_format($total, 2,',','.')}}</strong>
                        </li>
                    </ul> --}}
                  </div>
                  <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Finalizar Compra</h4>
                      <div class="mb-3">
                        <label for="address">Endereço</label>
                        <input type="text" class="form-control" name="billing_endereco">
                      </div>
                      <div class="mb-3">
                        <label for="address2">Complemento<span class="text-muted">(Bloco / Apartamento)</span></label>
                        <input type="text" name="billing_complemento" class="form-control">
                      </div>
                      <div class="mb-3">
                          <label for="address2">Ponto de Referência</label>
                          <input type="text" name="billing_pontoref" class="form-control">
                        </div>                    
                      <div class="row">
                        <div class="col-md-5 mb-3">
                          <label for="country">Cidade</label>
                          <input type="text" class="form-control" name="billing_cidade">
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="state">Estado<span class="text-muted">(Abreviado)</span></label>
                          <input type="text" class="form-control" name="billing_estado">
                        </div>
                        <div class="col-md-3 mb-3">
                          <label for="zip">Cep</label>
                          <input type="number" class="form-control" maxlength="3" id="cep" name="billing_cep" pattern="([0-9]{3})">
                        </div>
                      </div>                            
                      <hr class="mb-4">                    
                      <h4 class="mb-3">Forma de Pagamento</h4>                    
                      <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                          <input id="payment_gateway" name="payment_gateway" type="radio" class="custom-control-input" checked required>
                          <label class="custom-control-label" for="payment_gateway">Dinheiro</label>
                        </div>
                      </div>                            
                      <hr class="mb-4">
                      <button onclick="return validar()" class="btn btn-primary btn-lg btn-block" type="submit">Finalizar Pedido</button>
                  </div>
                </div>                
              </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $("#cep").keyup(function() {
      $("#cep").val(this.value.match(/[0-9]*/));
  });
});
  function validar(){
      var billing_endereco = formcheckout.billing_endereco.value;
      var billing_complemento = formcheckout.billing_complemento.value;
      var billing_pontoref = formcheckout.billing_pontoref.value;
      var billing_cidade = formcheckout.billing_cidade.value;       
      var billing_estado = formcheckout.billing_estado.value;
      var billing_cep = formcheckout.billing_cep.value;

      if(billing_endereco == ""){
          alert('Preencha o campo Endereço.');
          formcheckout.billing_endereco.focus();
          return false;
      }

      if(billing_complemento == ""){
          alert('Preencha o campo Complemento');
          formcheckout.billing_complemento.focus();
          return false;
      }

      if(billing_pontoref == ""){
          alert('Preencha o campo Ponto de Referência.');
          formcheckout.billing_pontoref.focus();
          return false;
      }

      if(billing_cidade == ""){
          alert('Preencha o campo Cidade.');
          formcheckout.billing_cidade.focus();
          return false;
      }

      if(billing_estado == ""){
          alert('Preencha o campo Estado.');
          formcheckout.billing_estado.focus();
          return false;
      }

      if(billing_cep == ""){
          alert('Preencha o campo Cep.');
          formcheckout.billing_cep.focus();
          return false;
      }        
  }
</script>

@endsection