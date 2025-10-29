<?php

namespace App\Repositories;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;

class SubscriptionRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public  function model()
    {
        return Subscription::class;
    }

    public function storeByRequest(SubscriptionRequest $request): Subscription
    {
        return $this->create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'duration_type' => $request->duration_type,
            'number_of_ads' => $request->number_of_ads,
            'status' => true,
            'description' => $request->description
        ]);
    }

    public function updateByRequest(SubscriptionRequest $request, Subscription $subscription): Subscription
    {
        $subscription->update([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'duration_type' => $request->duration_type,
            'number_of_ads' => $request->number_of_ads,
            'status' => $request->status ? true : false,
            'description' => $request->description
        ]);

        return $subscription;
    }

    public function toggleStatus(Subscription $subscription)
    {
        $subscription->update([
            'status' => !$subscription->status
        ]);
    }
}
