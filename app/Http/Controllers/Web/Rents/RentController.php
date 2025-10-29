<?php

namespace App\Http\Controllers\Web\Rents;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Rent;
use App\Repositories\RentRepository;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        $currency = Currency::first();
        $rents = (new RentRepository())->getAllRents();
        return view('rent.index', compact('rents','currency'));
    }

    public function show(Rent $rent)
    {
        $currency = Currency::first();
        return view('rent.details',compact('rent','currency'));
    }

    public function toggleActivationStatus(Rent $rent)
    {
        (new RentRepository())->updateStatusById($rent);

        return back()->with('success','Rent status updated successfully');
    }
}
