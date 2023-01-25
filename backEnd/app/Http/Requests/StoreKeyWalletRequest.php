<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKeyWalletRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'apelido' => 'Apelido',
            'email'   => 'E-mail',
            'key'     => 'Chave'
        ];
    }
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'apelido' => ['required','string'],
            'email' => ['string'],
            'key' => ['required', 'string'],
        ];
    }
}
