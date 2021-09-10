<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Contatos;

class CreateContatosRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|max:45',
            'nome' => 'required|string|max:255',
            'telefone' => 'required|celular_com_ddd',
            'mensagem' => 'required',
            'file' => 'required|mimes:doc,docx,pdf,odt,txt|max:500'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'E-mail é obrigatório!',
            'email.email' => 'E-mail informado não é válido!',
            'nome.required' => 'Nome é obrigatório!',
            'nome.max' => 'Nome deve ter no maximo 255 caracteres!',
            'telefone.required' => 'Campo telefone não é obrigatório!',
            'telefone.celular_com_ddd' => 'Telefone está no padrão incorreto! Favor utilizar (99)99999-9999',
            'mensagem.required' => 'A mensagem é obrigatória!',
            'file.required' => 'O arquivo é obrigatório!',
            'file.mimes' => 'Extensão de arquivo não aceita!',
            'file.max' => 'O arquivo ultrapassa o tamanho máximo de 500kb!',
        ];
    }
}
