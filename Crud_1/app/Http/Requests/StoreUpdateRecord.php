<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRecord extends FormRequest
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
            'nome'=> ['required','unique:records','min:3','max:20'],
            'email'=> ['required','email','unique:records'],
            'descricao'=>['required','min:10','max:1000'],
            'image'=> ['required','image']   
        ];

    }

    public function messages()
    {
        return [
            'nome.required'=> 'O Campo Precisa Ser Preenchido',
            'nome.unique'=> 'Nome Já existe, tente outro',
            'email.required'=> 'O Campo Precisa Ser Preenchido',
            'email.email'=> 'Formato De Email Invalido',
            'email.unique'=> 'Email Já existe, tente outro',
            'descricao.required'=> 'O Campo Precisa Ser Preenchido',
            'image.required'=> 'O Campo Precisa Ser Preenchido'
        ];
    }
    
}
