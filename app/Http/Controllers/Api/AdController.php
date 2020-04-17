<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdRequest;
use App\Services\AdService;

class AdController extends Controller
{
    protected $adService;

    public function __construct(AdService $adService)
    {
        $this->adService = $adService;
    }

    public function index()
    {
        return $this->adService->allAds();
    }

    public function ad($id)
    {
        return $this->adService->find($id);
    }
}
