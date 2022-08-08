<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'email',
        'cost',
        'valor',
        'valorTotal', 
        'metro2',
        'espessura',
        'altura',
        'largura',
        'profundidade',
        'led',
        'espelho',
        'paymentUrl',
        'cep',
        'frete',
    ];
}
