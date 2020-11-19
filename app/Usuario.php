<?php

namespace App;

use Carbon\Carbon;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model; // UUID Model

class Usuario extends Model
{
    /**
     * Format the date from brazillian format to ISO format.
     *
     * @param string $value
     */
    public function setNascimentoAttribute( string $value )
    {
        $this->attributes['nascimento'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');;
    }
}
