<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use App\Repositories\SubscriptionRepository;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct(
        public  $subscriptionRepository = (new SubscriptionRepository()),
    ) { }

    public function index()
    {
        $subscriptions = $this->subscriptionRepository->getAll();
        return view('subscription.index', compact('subscriptions'));
    }

    public function create(){
        return view('subscription.create');
    }

    public function store(SubscriptionRequest $request)
    {
        $this->subscriptionRepository->storeByRequest($request);
        return redirect()->route('subscription.index')->with('success', 'Subscription created successfully');
    }

    public function edit(Subscription $subscription)
    {
        return view('subscription.edit', compact('subscription'));
    }

    public function update(SubscriptionRequest $request, Subscription $subscription)
    {
        $this->subscriptionRepository->updateByRequest($request, $subscription);
        return redirect()->route('subscription.index')->with('success', 'Subscription updated successfully');
    }

    public function toggleStatus(Subscription $subscription)
    {
        $this->subscriptionRepository->toggleStatus($subscription);
        return redirect()->route('subscription.index')->with('success', ' Status updated successfully');
    }
}
