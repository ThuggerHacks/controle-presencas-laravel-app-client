<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class teacherSearchValidator extends FormRequest
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
            "curso" => "required",
            "cadeira" => "required",
        ];
    }

    public function messages(){

        return [
            "ano.required" => "Por favor selecione o ano",
            "curso.required" => "Por favor selecione o curso",
            "cadeira.required" => "Por favor selecione o cadeira",
        ];
    }
}
