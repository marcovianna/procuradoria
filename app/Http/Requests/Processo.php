<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Processo extends FormRequest
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
            //'numero_judicial' => 'required|min:8',
            //'numero_alerj'    => 'required|size:7',
        ];
    }
}
