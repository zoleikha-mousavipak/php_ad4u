<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Services\AdService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $adService;
    protected $userService;

    public function __construct(AdService $adService, UserService $userService)
    {
        $this->adService = $adService;
        $this->userService = $userService;
    }

    public function index()
    {
        $t = date("H");
        return view('profile.index', compact('t'));
    }

    public function ads()
    {
        $ads = $this->adService->userAds();
        return view('profile.ads', compact('ads'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        $user = Auth::user();
        $this->userService->updateProfile($user, $request);
        return redirect(route('profile.index'));
    }
}
