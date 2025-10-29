<?php

namespace App\Http\Controllers\Web\Currency;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Repositories\CurrencyRepository;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currency = (new CurrencyRepository())->getCurrency();
        return view('currency.index', compact('currency'));
    }

    public function updateOrCreate(Request $request)
    {
        $this->validate($request,[
            'symbol' => 'required'
        ]);
        
        (new CurrencyRepository())->updateOrCreateByRequest($request);

        return redirect()->back()->with('success','Currency updated');
    }
}
