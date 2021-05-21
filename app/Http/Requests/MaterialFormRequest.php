<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MaterialFormRequest extends FormRequest
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
            'id_categoria'=>'required',
            'codigo'=>['required',
            Rule::unique('material')->ignore($this->route('role'))
                        ],
            'nombre'=>['required',
            Rule::unique('material')->ignore($this->route('role'))
                        ],
            'stock'=>'required|numeric',
            'descripcion'=>'max:400',
            'imagen'=>'mimes:png,bmp,jpeg'
        ];
    }
}
