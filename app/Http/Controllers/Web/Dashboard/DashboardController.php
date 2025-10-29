<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Repositories\AreaRepository;
use App\Repositories\CityRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\RentRepository;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = (new CustomerRepository())->getAllOrFindBySearch()->count();
        $activeRent = (new RentRepository())->query()->isActive()->count();
        $rent = (new RentRepository())->getAllRents()->count();
        $city = (new CityRepository())->getAll()->count();
        $area = (new AreaRepository())->getAll()->count();
        $todayRents = (new RentRepository())->getByTodays();
        $currency = Currency::first();
        return view('dashboard.index', compact('customer','activeRent','rent','city','area','todayRents','currency'));
    }
}
