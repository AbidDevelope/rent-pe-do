<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Repositories\CustomerRepository;
use App\Repositories\NotificationRepository;
use App\Services\NotificationServices;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $customers = (new CustomerRepository())->getAll();

        $device_type = request()->device_type;
        if ($device_type && $device_type != 'all') {
            $customers = Customer::whereHas('devices', function ($device) use ($device_type) {
                $device->where('device_type', $device_type);
            })->get();
        }

        return view('notifications.index', compact('customers'));
    }

    public function sendNotification(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'customer' => 'required|array'
        ]);

        $message = $request->message;
        $customers = $request->customer;
        foreach ($customers as $customerID) {
            $customer = Customer::find($customerID);
            if ($customer->devices->count()) {
                $keys = $customer->devices->pluck('key')->toArray();
                (new NotificationServices($message, $keys, 'Rentdo'));
            }
            (new NotificationRepository())->storeByRequest($customer->id,$message);
        }
        return back()->with('success', 'Send Successfully');
    }
}