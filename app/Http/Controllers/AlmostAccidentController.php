<?php

namespace App\Http\Controllers;

use App\Models\AlmostAccident;
use App\Http\Requests\StoreAlmostAccidentRequest;
use App\Http\Requests\UpdateAlmostAccidentRequest;

class AlmostAccidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.pelaporan.hampir.index', [
            'title' => 'Hampir/Nyaris Kecelakaan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlmostAccidentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AlmostAccident $almostAccident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlmostAccident $almostAccident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlmostAccidentRequest $request, AlmostAccident $almostAccident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlmostAccident $almostAccident)
    {
        //
    }
}
