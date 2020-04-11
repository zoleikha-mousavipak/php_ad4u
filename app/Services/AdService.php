<?php

namespace App\Services;

use App\Models\Ad;
use Illuminate\Support\Facades\Auth;

class AdService extends BaseService
{
    public function __construct(Ad $ad)
    {
        $this->model = $ad;
    }

    public function createAd($request)
    {
        $ad = new $this->model;
        $ad->title = $request->title;
        $ad->category_id = $request->category;
        $ad->type_id = $request->type;
        $ad->price = $request->price;
        $ad->description = $request->description;
        $ad->latitude = $request->latitude;
        $ad->longitude = $request->longitude;
        $ad->user_id = Auth::user()->id;
        $ad->save();
        return $ad;
    }

    public function userAds()
    {
        return $this->model->where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate(env('APP_PAGINATION'));
    }

    public function allAds()
    {
        return $this->model->whereStatus(true)->orderby('id', 'desc')->paginate(env('APP_PAGINATION'));
    }
}
