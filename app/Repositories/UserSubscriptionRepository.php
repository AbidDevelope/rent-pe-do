<?php

namespace App\Repositories;

use App\Http\Requests\SubscriptionBuyRequest;
use App\Models\Subscription;
use App\Models\UserSubscription;

class UserSubscriptionRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public function model()
    {
        return UserSubscription::class;
    }

    public function storeByRequest(SubscriptionBuyRequest $request): UserSubscription
    {
        $subscription = Subscription::find($request->subscription_id);

        $durationType = $subscription->duration_type;
        $expiryDate = now()->addDays($subscription->duration);
        if ($durationType == 'month') {
            $expiryDate = now()->addMonths($subscription->duration);
        } elseif ($durationType == 'year') {
            $expiryDate = now()->addYears($subscription->duration);
        }

        return $this->create([
            'subscription_id' => $subscription->id,
            'user_id' => auth()->id(),
            'available_ads' => $subscription->number_of_ads,
            'payment_status' => false,
            'expiry_date' => $expiryDate->format('Y-m-d H:i:s'),
        ]);
    }

    public function updatePaymentStatus(UserSubscription $userSubscription): UserSubscription
    {
        $userSubscription->update([
            'payment_status' => true
        ]);
        return $userSubscription;
    }
}
