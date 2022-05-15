<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'monto',
        'cuentapropias_sale_id',
        'cuentapropias_entra_id',
        'cuentaterceros_entra_id',
        'user_id'
    ];


}
