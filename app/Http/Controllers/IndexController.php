<?php

namespace App\Http\Controllers;

use App\Services\AdService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    protected $adService;

    public function __construct(AdService $adService)
    {
        $this->adService = $adService;
    }

    public function index()
    {

        $ads = $this->adService->allAds();
        $owner = false;
        return view('welcome', compact('ads'));
    }
}
