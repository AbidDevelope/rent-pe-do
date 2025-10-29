<?php

namespace App\Http\Controllers\Web\Social;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $links = Social::all();
        return view('social.index',compact('links'));
    }
    public function store(Request $request)
    {
        Social::create([
            'icon' => $request->icon,
            'link' => $request->link,
            'target' => $request->target
        ]);

        return redirect()->back()->with('success','Social link added Success');
    }
    public function update(Social $social,Request $request)
    {
        $social->update([
            'icon' => $request->icon,
            'link' => $request->link,
            'target' => $request->target
        ]);

        return redirect()->back()->with('success','Social link updated Success');
    }
    public function delete(Social $social)
    {
       $social->delete();
       return redirect()->back()->with('success','Social link deleted Success');
    }
}
