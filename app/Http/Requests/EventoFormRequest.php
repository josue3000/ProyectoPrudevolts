<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoFormRequest extends FormRequest
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
        // return [
        // 'id_persona'=> 'required',
        // 'titulo'=>'required',
        // 'descripcion'=>'max:255',
        // 'start'=>'required',
        // 'end'=>'required',
        // 'color'=>'max:20',
        // 'colorText'=>'max:20'
        // ];
    }
}
