<?php

namespace App\Http\Controllers;

use App\Services\AdService;
use Illuminate\Http\Request;

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
        return view('welcome', compact('ads'));
    }
}
