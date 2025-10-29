<?php

namespace App\Http\Controllers\Web\Vehicle_Attributes;

use App\Http\Controllers\Controller;
use App\Models\Fuel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Transmission;
use App\Models\VehicleType;

class VehicleAttributesController extends Controller
{
    public function transmissions()
    {
        $data['transmissions'] = Transmission::all();
        return view('vehicle-attributes.transmissions.index', $data);
    }

    public function transmissionCreate()
    {
        return view('vehicle-attributes.transmissions.create');
    }

    public function transmissionStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:transmissions,name'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        Transmission::create([
            'name' => $request->name,
        ]);

        return redirect()->route('transmissions');
    }

    public function transmissionEdit($id)
    {
        $data['transmission'] = Transmission::find($id);

        return view('vehicle-attributes.transmissions.edit', $data);
    }

    public function transmissionUpdate(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:transmissions,name'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $transmission = Transmission::where('id', $id)->first();
        if ($transmission) {
            $transmission->update([
                'name' => $request->name
            ]);

            return redirect()->route('transmissions');
        }
    }

    public function transmissionDelete($id)
    {
        $transmission = Transmission::find($id);
        if ($transmission) {
            $transmission->delete();

            return redirect()->back();
        }
    }

    public function fuels()
    {
        $data['fuels'] = Fuel::all();
        return view('vehicle-attributes.fuels.index', $data);
    }

    public function fuelCreate()
    {
        return view('vehicle-attributes.fuels.create');
    }

    public function fuelStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:fuels,name'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        Fuel::create([
            'name' => $request->name,
        ]);

        return redirect()->route('fuels');
    }

    public function fuelEdit($id)
    {
        $data['fuel'] = Fuel::find($id);

        return view('vehicle-attributes.fuels.edit', $data);
    }

    public function fuelUpdate(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:fuels,name'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $fuel = Fuel::where('id', $id)->first();
        if ($fuel) {
            $fuel->update([
                'name' => $request->name
            ]);

            return redirect()->route('fuels');
        }
    }

    public function fuelDelete($id)
    {
        $fuel = Fuel::find($id);
        if ($fuel) {
            $fuel->delete();

            return redirect()->back();
        }
    }

    public function vehicleTypes()
    {
        $data['vehicleTypes'] = VehicleType::all();
        return view('vehicle-attributes.vehicle-types.index', $data);
    }

    public function vehicleTypeCreate()
    {
        return view('vehicle-attributes.vehicle-types.create');
    }

    public function vehicleTypeStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:vehicle_types,name'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        VehicleType::create([
            'name' => $request->name,
        ]);

        return redirect()->route('vehicle_types');
    }

    public function vehicleTypeEdit($id)
    {
        $data['vehicleType'] = VehicleType::find($id);

        return view('vehicle-attributes.vehicle-types.edit', $data);
    }

     public function vehicleTypeUpdate(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:vehicle_types,name'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $vehicleType = VehicleType::where('id', $id)->first();
        if ($vehicleType) {
            $vehicleType->update([
                'name' => $request->name
            ]);

            return redirect()->route('vehicle_types');
        }
    }

    public function vehicleTypeDelete($id)
    {
        $vehicleType = VehicleType::find($id);
        if ($vehicleType) {
            $vehicleType->delete();

            return redirect()->back();
        }
    }
}
