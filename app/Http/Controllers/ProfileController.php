<?php

namespace App\Http\Controllers;

use App\Services\AdService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $AdService;

    public function __construct(AdService  $adService)
    {
        $this->adService = $adService;
    }

    public function index()
    {
        return view('profile.index');
    }

    public function ads()
    {
        $ads = $this->adService->userAds();
        return view('profile.ads', compact('ads'));
    }
}
