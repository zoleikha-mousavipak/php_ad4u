<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;
use App\Services\TypeService;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    protected $typeService;

    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typesList = $this->typeService->paginate(env('APP_PAGINATE'));
        return view('admin.types.index', compact('typesList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        $type = $this->typeService->createType($request);
        return redirect(route('admin.types.show', $type));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = $this->typeService->find($id);
        return view('admin.types.view', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = $this->typeService->type($id);
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, $id)
    {
        $type = $this->typeService->find($id);
        $this->typeService->updateType($type, $request);
        return redirect(route('admin.types.index', $type));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = $this->typeService->find($id);
        $this->typeService->deleteType($type);
        return redirect(route('admin.types.index'));
    }
}
