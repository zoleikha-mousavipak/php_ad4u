<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
use App\Services\AdService;
use App\Services\CategoryService;
use App\Services\TypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    protected $adService;
    protected $categoryService;
    protected $typeService;

    public function __construct(AdService $adService, CategoryService $categoryService, TypeService $typeService)
    {
        $this->adService = $adService;
        $this->categoryService = $categoryService;
        $this->typeService = $typeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 1;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesList = $this->categoryService->categoriesList();
        $typesList = $this->typeService->typesList();
        return view('ads.create', compact('categoriesList', 'typesList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdRequest $request)
    {
        $ad = $this->adService->createAd($request);
        return redirect(route('ads.show', $ad));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = $this->adService->find($id);
        $owner = false;
        if (Auth::user() && (Auth::user()->id === $ad->user_id)) {
            $owner = true;
        }
        return view('ads.view', compact('ad', 'owner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = $this->adService->userAd($id);
        $categoriesList = $this->categoryService->categoriesList();
        $typesList = $this->typeService->typesList();
        return view('ads.edit', compact('ad', 'categoriesList', 'typesList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(adRequest $request, $id)
    {
        $ad = $this->adService->find($id);
        $this->adService->updateAd($ad, $request);
        return redirect(route('ads.show', $ad));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = $this->adService->find($id);
        $this->adService->deleteAd($ad);
        return redirect(route('welcome'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $category = $request->get('category');
        $results = $this->adService->searchAd($query, $category);
        return view('ads.search', compact('results'));
    }
}
