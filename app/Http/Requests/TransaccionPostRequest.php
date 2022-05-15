<?php

namespace App\Http\Requests;

use App\Rules\ValidaSaldo;
use App\Rules\ValidaSi;
use Illuminate\Foundation\Http\FormRequest;

class TransaccionPostRequest extends FormRequest
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
            
            'cuentapropias_sale_id' => 'required',
            'cuentapropias_entra_id' => [
                new ValidaSi(request()->cuentaterceros_entra_id,
                    request()->cuentapropias_sale_id),
            ],

            'cuentaterceros_entra_id' => [
                new ValidaSi(request()->cuentapropias_entra_id,''),
            ],

            'monto'=>['required','numeric',
                    new ValidaSaldo(request()->cuentapropias_sale_id),
                ],

        ];
    }

    public function messages(){

        return[
            'cuentapropias_sale_id.required' => 'Debe seleccionar la cuenta origen.',
            'monto.required' => 'Debe digitar el monto a transferir.',
        ];
    }  


}
