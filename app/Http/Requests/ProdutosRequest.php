<?php

namespace demanda\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Nesse caso setei como true para sempre autorizar
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Regras da Requisição
        return [
            'nome'      => 'required|max:100',
            'descricao' => 'required|max:255',
            'valor'     => 'required|numeric'
        ];
    }
}
