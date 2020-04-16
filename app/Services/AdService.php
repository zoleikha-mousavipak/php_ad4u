<?php

namespace App\Services;

use App\Models\Ad;
use Illuminate\Support\Facades\Auth;

class AdService extends BaseService
{
    protected $imageService;

    public function __construct(Ad $ad, ImageService $imageService)
    {
        $this->model = $ad;
        $this->imageService = $imageService;
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

        if ($request->images) {
            $this->imageService->createImages($request->images, $ad);
        }

        return $ad;
    }

    public function updateAd($ad, $request)
    {
        $ad->title = $request->title;
        $ad->category_id = $request->category;
        $ad->type_id = $request->type;
        $ad->price = $request->price;
        $ad->description = $request->description;
        $ad->latitude = $request->latitude;
        $ad->longitude = $request->longitude;
        $ad->update();
    }

    public function deleteAd($ad)
    {
        $ad->delete();
    }

    public function userAd($id)
    {
        return $this->model->where('user_id', Auth::user()->id)->where('id', $id)->first();
    }

    public function userAds()
    {
        return $this->model->where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate(env('APP_PAGINATION'));
    }

    public function allAds()
    {
        return $this->model->whereStatus(true)->orderby('id', 'desc')->paginate(env('APP_PAGINATION'));
    }

    public function searchAd($query, $category)
    {
        if ($category) {
            return $this->model
                ->where('category_id', $category)
                ->where(function ($q) use ($query) {
                    $q->where('title', 'LIKE', "%{$query}%")
                        ->orWhere('description', 'LIKE', "%{$query}%");
                })
                ->paginate(env('APP_PAGINATION'));
        }
        return $this->model->where('title', 'LIKE', "%{$query}%")->orWhere('description', 'LIKE', "%{$query}%")->paginate(env('APP_PAGINATION'));
    }
}
