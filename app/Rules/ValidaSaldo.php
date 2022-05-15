<?php

namespace App\Rules;

use App\Models\Cuentapropia;
use Illuminate\Contracts\Validation\Rule;

class ValidaSaldo implements Rule
{

    private $cuentaPropia = "";
    private $message = "";
    
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($cuentaPropia  )
    {
        $this->cuentaPropia = $cuentaPropia; 
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $valReturn = true;

        if ($this->cuentaPropia === 'Seleccionar') {
            $this->message = "Debe seleccionar cuenta origen";
            $valReturn = false;
        } else {
            $cuenta = Cuentapropia::find($this->cuentaPropia);
            if ($cuenta->saldo < $value) {
                $this->message = "No tiene el saldo suficiente para hacer la transacción";
                $valReturn = false;
            }
        }
            
        return $valReturn;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
