<?php

namespace App\Http\Controllers\API\Currency;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currency = Currency::first();
        return $this->json('Currency Symbol',[
            'currency' => $currency ? $currency->symbol : '$'
        ]);
    }
}
