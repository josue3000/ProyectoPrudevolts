<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PersonaFormRequest extends FormRequest
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
            'nombre'=>[
                'required',
                Rule::unique('persona')->ignore($this->route('role')),'regex:/^[\pL\s\-]+$/u'
                
            ],
            'tipo_documento'=>'required|max:20',
            // 'num_documento'=>[
            //     'required',
            //     Rule::unique('persona')->ignore($this->route('role'))
              
            //                  ],
            'num_documento'=>'max:9',
            'direccion'=>'max:150',
            'telefono'=>'min:8|max:8',
            'email'=>'email',
            'coordenadas'=>'max:256'
        ];
    }
}
