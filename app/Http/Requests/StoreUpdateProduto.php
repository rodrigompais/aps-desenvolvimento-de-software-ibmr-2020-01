<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required|min:6|max:100',
            'preco'             => 'required',
            'detalhe'           => 'required',
            'descricao'         => 'required|min:10|max:1000',
            'imagem'            => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                  => 'O Campo Nome é de preenchimento obrigatório!',
            'preco.required'                 => 'O Campo Preço é de preenchimento obrigatório!',
            'detalhe.required'               => 'O Campo Detalhes é de preenchimento obrigatório!',
            'descricao.required'             => 'O Campo Descrição é de preenchimento obrigatório!',
            'imagem.required'                => 'O Upload da Foto é obrigatório!',
        ];
    }
}
