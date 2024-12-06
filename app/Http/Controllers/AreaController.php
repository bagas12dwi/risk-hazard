<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        Area::create($validatedData);
        return redirect()->route('hse.dashboard')->with('success', 'Area berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $route = '';
        if (auth()->user()->role == 'hse') {
            $validatedData = $request->validate([
                'areas.*.id' => 'required|exists:areas,id',
                'areas.*.microbiology' => 'required|numeric',
                'areas.*.humidity' => 'required|numeric',
                'areas.*.lighting' => 'required|numeric',
                'areas.*.noise' => 'required|numeric',
                'areas.*.pdf_microbiology' => 'nullable|file|mimes:pdf',
                'areas.*.pdf_humidity' => 'nullable|file|mimes:pdf',
                'areas.*.pdf_lighting' => 'nullable|file|mimes:pdf',
                'areas.*.pdf_noise' => 'nullable|file|mimes:pdf',
            ]);

            foreach ($validatedData['areas'] as $areaData) {
                $area = Area::findOrFail($areaData['id']);
                foreach (['microbiology', 'humidity', 'lighting', 'noise'] as $parameter) {
                    if (isset($areaData["pdf_{$parameter}"])) {
                        $areaData["pdf_{$parameter}"] = $areaData["pdf_{$parameter}"]->store('area');
                    }
                }
                $area->update($areaData);
            }

            $route = redirect()->route('hse.dashboard')->with('success', "Data untuk area $area->name berhasil ditambahkan");
        } else if (auth()->user()->role == 'admin') {
            $validatedData = $request->validate([
                'areas.*.id' => 'required|exists:areas,id',
                'areas.*.is_approve_microbiology' => 'nullable|boolean',
                'areas.*.is_approve_humidity' => 'nullable|boolean',
                'areas.*.is_approve_lighting' => 'nullable|boolean',
                'areas.*.is_approve_noise' => 'nullable|boolean',
            ]);

            foreach ($request->input('areas', []) as $areaData) {
                $area = Area::findOrFail($areaData['id']);

                // Default missing checkboxes to false
                // Prepare the update data
                $updateData = [];

                foreach (['is_approve_microbiology', 'is_approve_humidity', 'is_approve_lighting', 'is_approve_noise'] as $field) {
                    if (array_key_exists($field, $areaData)) {
                        $updateData[$field] = $areaData[$field]; // Only update fields present in the request
                    }
                }

                $area->update($updateData);
            }
            $route = redirect()->route('admin.dashboard')->with("success, Data untuk area $area->name berhasil dikonfirmasi !");
        }

        return $route;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        //
    }
}
