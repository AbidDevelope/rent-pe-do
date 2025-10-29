<?php


namespace App\Repositories;

use App\Models\DeviceKey;
use Ladumor\OneSignal\OneSignal;

class DeviceKeyRepository extends Repository
{
    public function model()
    {
        return DeviceKey::class;
    }

    public function getAll()
    {
        return $this->model()::all();
    }

    public function findByKey($key)
    {
        return $this->model()::where('key', $key)->first();
    }

    public function storeByRequest($customer, $request): DeviceKey
    {
        $exists = $this->findByKey($request->key);
        if(!$exists){
            $exists = $this->model()::create([
                'customer_id' => $customer->id,
                'key' => $request->device_key,
                'device_type' => $request->device_type
            ]);
        }

        return $exists;
    }

    public function destroy($key): bool
    {
        $exists = $this->findByKey($key);

        if($exists){
            $exists->delete();
            return true;
        }
        return false;
    }
}
