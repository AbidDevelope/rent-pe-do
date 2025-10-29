<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdsRequest;
use App\Models\Ads;
use App\Repositories\AdsRepository;

class AdsController extends Controller
{
    public function index()
    {
        $ads = (new AdsRepository())->getAll();
        return view('ads.index', compact('ads'));
    }

    public function create()
    {
        return view('ads.create');
    }

    public function store(AdsRequest $request)
    {
        (new AdsRepository())->storeByRequest($request);
        return redirect()->route('ads.index')->with('success', 'Ads created successfully');
    }

    public function destroy(Ads $ads){
        (new AdsRepository())->destroy($ads);
        return redirect()->route('ads.index')->with('success', 'Ads deleted successfully');
    }
}
