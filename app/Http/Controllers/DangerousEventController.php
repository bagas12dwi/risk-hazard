<?php

namespace App\Http\Controllers;

use App\Models\DangerousEvent;
use App\Http\Requests\StoreDangerousEventRequest;
use App\Http\Requests\UpdateDangerousEventRequest;

class DangerousEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.pelaporan.kejadian.index', [
            'title' => 'Kejadian Bahaya'
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
    public function store(StoreDangerousEventRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DangerousEvent $dangerousEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DangerousEvent $dangerousEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDangerousEventRequest $request, DangerousEvent $dangerousEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DangerousEvent $dangerousEvent)
    {
        //
    }
}
