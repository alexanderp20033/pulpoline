<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use AshAllenDesign\LaravelExchangeRates\ExchangeRate;

use Guzzle\Http\Exception\ClientErrorResponseException;

use carbon\Carbon;
use http;
class CurrencyController extends Controller
{
    //

    public function index() {

     return view('currency');
    }

    public function exchangeCurrency(Request $request) {

      $amount = ($request->amount)?($request->amount):(1);

      $apikey = '8a2921d5015be38d5c36';

      $from_Currency = urlencode($request->from_currency);
      $to_Currency = urlencode($request->to_currency);
      $query =  "{$from_Currency}_{$to_Currency}";

      // change to the free URL if you're using the free version
      $json = file_get_contents("https://free.currconv.com/api/v5/convert?q={$query}&compact=y&apiKey={$apikey}");

      $obj = json_decode($json, true);

      $val = $obj["$query"];

      $total = $val['val'] * 1;

      $total2 = $val['val'] * $amount;

      $formatValue = number_format($total, 2, '.', '2');

      $data = "$amount $from_Currency = $total2 $to_Currency,
        $from_Currency=  $formatValue";
        //$data = "aqui deberia mostrar el total pero no he podido";
      echo $data; die;










   }

}


