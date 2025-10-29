<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\RentConfig;
use Illuminate\Http\Request;

class RentConfigController extends Controller
{
    public function index()
    {
        $rentConfig = RentConfig::first();
        $currency = Currency::first();
        return view('rent-config.index', compact('rentConfig', 'currency'));
    }

    public function update(Request $request, $id = null)
    {
        RentConfig::updateOrCreate(
            [
                'id' => $id ?? 0
            ],
            [
                'price' => $request->price,
                'is_paid' => $request->is_paid ? true : false
            ]
        );

        return back()->with('success', 'Updated successfully');
    }

    public function getConfig(){
        $rentConfig = RentConfig::first();
        
        return $this->json('rent configuration', [
            'rent_premium' => (bool) $rentConfig?->is_paid ?? false,
            'rent_price' => $rentConfig?->is_paid ? number_format($rentConfig?->price, 2) : number_format(0, 2),
        ]);
    }
}
