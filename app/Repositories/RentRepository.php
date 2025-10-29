<?php

namespace App\Repositories;

use App\Http\Requests\RentRequest;
use App\Models\Rent;
use App\Models\RentConfig;
use Carbon\Carbon;

class RentRepository extends Repository
{
    public function model()
    {
        return Rent::class;
    }

    public function getAllRents()
    {
        $rents = $this->model()::query();
        return $rents->latest()->get();
    }

    public function getByTodays()
    {
        $rents = $this->model()::whereDate('created_at', Carbon::today());
        return $rents->latest()->paginate(10);
    }

    public function getAll()
    {
        $request = request();
        $city = $request->city;
        $rentType = $request->rent_type;
        $badroom = $request->badroom;
        $washroom = $request->washroom;
        $month = $request->month;
        $min = $request->min;
        $max = $request->max;

        $rents = $this->query()->when($request->short_by, function($query){
            $query->latest('id');
        })
        ->when($city, function($query) use($city){
            $query->whereHas('rentInfo', function ($rentInfo) use ($city) {
                $rentInfo->where('city_id', $city);
            });
        })
        ->when($rentType, function($query) use($rentType){
            $query->where('type', $rentType);
        })
        ->when($request->male_student, function($query){
            $query->whereHas('forRent', function ($forRent) {
                $forRent->where('male_student', 1);
            });
        })
        ->when($request->female_student, function($query){
            $query->whereHas('forRent', function ($forRent) {
                $forRent->where('female_student', 1);
            });
        })
        ->when($request->man_job, function($query){
            $query->whereHas('forRent', function ($forRent) {
                $forRent->where('man_job', 1);
            });
        })
        ->when($request->women_job, function($query){
            $query->whereHas('forRent', function ($forRent) {
                $forRent->where('women_job', 1);
            });
        })
        ->when(($badroom && $badroom == 5), function($query) use($badroom){
            $query->where('bad', '>=', $badroom);
        })
        ->when(($washroom && $washroom == 5), function($query) use($washroom){
            $query->where('bad', '>=', $washroom);
        })
        ->when($month, function($query) use($month){
            $query->whereHas('rentInfo', function ($rentInfo) use($month){
                $rentInfo->where('month', $month)->latest('id');
            });
        })
        ->when(($min && $max == ''), function($query) use($min){
            $query->whereHas('cost', function ($cost) use ($min) {
                $cost->where('rent_price', '>=', $min);
            });
        })
        ->when(($max && $min == ''), function($query) use($max){
            $query->whereHas('cost', function ($cost) use ($max) {
                $cost->where('rent_price', '<=', $max);
            });
        })
        ->when(($min && $max), function($query) use($min, $max){
            $query->whereHas('cost', function ($cost) use ($min, $max) {
                $cost->whereBetween('rent_price', [$min, $max]);
            });
        })
        ->when($request->heigh_to_low, function($query){
            $query->orderBy('price', 'desc');
        })
        ->when(!$request->heigh_to_low, function($query){
            $query->orderBy('price', 'asc');
        })->isActive()->get();

        $nearest = [];
        foreach ($rents as $k => $rent) {
            $distance = $k;
            if($request->latitude && $request->longitude){
                $distance = getDistance([$request->latitude, $request->longitude], [$rent->latitude, $rent->longitude]);
            }
            $nearest[(string) round($distance, 2)] = $rent;
        }

        ksort($nearest);
        
        return $nearest;
    }

    public function findById($id)
    {
        return $this->find($id);
    }

    public function storeByRequest(RentRequest $request)
    {
        $rentConfig = RentConfig::first();
        $customer  = auth()->user()->customer;
        $rent = $this->create([
            'customer_id' => $customer->id,
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'washroom' => $request->washroom,
            'balcony' => $request->balcony,
            'position' => $request->position,
            'bad' => $request->bad,
            'price' => $request->rent_price,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'is_active' => false,
            'is_paid' => $rentConfig?->is_paid ? true : false,
            'ads_price' =>$rentConfig?->is_paid ? ($rentConfig?->price ?? 0) : 0
        ]);

        (new CostRepository())->storeByRequest($request, $rent);
        (new FacilityRepository())->storeByRequest($request, $rent);
        (new ForRentRepository())->storeByRequest($request, $rent);
        (new ReligionRepository())->storeByRequest($request, $rent);
        (new RentInfoRepository())->storeByRequest($request, $rent);
        (new RentThumbnailRepository())->storeByRequest($request, $rent);

        return $rent;
    }

    public function updateByRequest(RentRequest $request, Rent $rent): Rent
    {
        $customer  = auth()->user()->customer;
        $rent->update([
            'customer_id' => $customer->id,
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'washroom' => $request->washroom,
            'balcony' => $request->balcony,
            'position' => $request->position,
            'bad' => $request->bad,
            'price' => $request->rent_price,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        (new CostRepository())->updateByRequest($request, $rent);
        (new FacilityRepository())->updateByRequest($request, $rent);
        (new ForRentRepository())->updateByRequest($request, $rent);
        (new ReligionRepository())->updateByRequest($request, $rent);
        (new RentInfoRepository())->updateByRequest($request, $rent);
        (new RentThumbnailRepository())->updateByRequest($request, $rent);

        return $rent;
    }

    public function updateStatusById(Rent $rent): Rent
    {
        $rent->update([
            'is_active' => !$rent->is_active
        ]);

        return $rent;
    }
}
