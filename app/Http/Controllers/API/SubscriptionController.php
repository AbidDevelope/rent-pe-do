<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionBuyRequest;
use App\Http\Resources\SubscriptionResource;
use App\Http\Resources\UserSubscriptionResource;
use App\Models\UserSubscription;
use App\Repositories\SubscriptionRepository;
use App\Repositories\UserSubscriptionRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = (new SubscriptionRepository())->query()->isActive()->get();
        return $this->json('Subscriptions List', [
            'subscriptions' => SubscriptionResource::collection($subscriptions),
        ]);
    }

    public function buy(SubscriptionBuyRequest $request)
    {
        $subscription = (new UserSubscriptionRepository())->storeByRequest($request);
        return $this->json('Subscription Purchased', [
            'subscription' => UserSubscriptionResource::make($subscription),
        ]);
    }

    public function updatePaymentStatus(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|exists:user_subscriptions,id',
        ]);

        $userSubscription = (new UserSubscriptionRepository())->find($request->subscription_id);
        $userSubscription = (new UserSubscriptionRepository())->updatePaymentStatus($userSubscription);
        return $this->json('Subscription Payment Status Updated Successfully', [
            'subscription' => UserSubscriptionResource::make($userSubscription),
        ]);
    }

    public function userSubscriptions()
    {
        $subscriptions = auth()->user()->subscriptions;
        return $this->json('User Subscriptions', [
            'subscriptions' => UserSubscriptionResource::collection($subscriptions),
        ]);
    }
}
