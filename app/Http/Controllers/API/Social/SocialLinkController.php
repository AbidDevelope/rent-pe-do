<?php

namespace App\Http\Controllers\API\Social;

use App\Http\Controllers\Controller;
use App\Http\Resources\SocialLinkResource;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socials = Social::all();
       return $this->json('Social link list',[
           'social' => SocialLinkResource::collection($socials)
        ]);
    }
}
