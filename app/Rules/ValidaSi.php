<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidaSi implements Rule
{
    private $campoContrario = "";
    private $cuentaSale = "";
    private $message = "";
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($campoContrario, $cuentaSale="")
    {
        $this->campoContrario = $campoContrario;
        $this->cuentaSale = $cuentaSale;
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
        

        if ($value === 'Seleccionar' && !$this->campoContrario) {
            $this->message = "Debe seleccionar las opciones";
            return false;
        }

        if($attribute === 'cuentapropias_entra_id' && $value == $this->cuentaSale) {
            $this->message = 'Verifique que la cuenta destino no sea la misma cuenta origen.';
            return false;
        }

        

        return  true ;
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
