<?php

namespace App\Http\Controllers\Calculator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Mail\OrderCreated;
use App\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use \MercadoPago\SDK;
use \MercadoPago\Preference;
use \MercadoPago\Item;
use View;

class IndexController extends Controller
{

    public function index(Request $request)
    {

        $data['email'] = Str::random() . "@teste.com.br";
        $data['cep'] =  rand(1111111, 9999999);
        $data['metro2'] = $data['espessura'] = $data['altura']= $data['largura']= $data['profundidade']= $data['led']= $data['espelho'] = 10;
        $data['cost'] = rand(50, 500);
        $data['valor'] = rand(50, 500);
        $data['frete'] = rand(10, 50);
        $data['valorTotal'] = $data['valor'] + $data['frete'];
        $data['order_id'] = Str::random();
        $data['paymentUrl'] = "http://www.checkout.com.br/" . $data['order_id'];

        // salva no banco
        $user = Order::create($data);
        var_dump($data);die;

        $data = static::$formFields;

        if ($request->session()->has('expositor')) {
            $data = $request->session()->get('expositor');
        }

        return View::make("calculadora")->with("data", $data);
    }
}
