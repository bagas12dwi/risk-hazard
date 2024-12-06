<?php

namespace App\Http\Controllers;

use App\Models\WorkAccident;
use App\Http\Requests\StoreWorkAccidentRequest;
use App\Http\Requests\UpdateWorkAccidentRequest;
use App\Models\ImageFile;
use App\Models\Notification;
use App\Models\ReportType;
use App\Models\Victim;
use Illuminate\Http\Request;

class WorkAccidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.pelaporan.kecelakaan.index', [
            'title' => 'Kecelakaan Kerja'
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'time_of_incident' => 'required',
            'location' => 'required',
            'chronology' => 'required',
            'effect' => 'required',
        ]);

        $validatedData['report_type_id'] = 0;
        $validatedData['user_id'] = auth()->user()->id;
        $route = '';

        if ($request->input('url_form') == route('kecelakaan')) {
            $validatedData['report_type_id'] = 1;
            $route = redirect()->route('kecelakaan')->with('success', 'Laporan berhasil ditambahkan!');
        } elseif ($request->input('url_form') == route('kejadian')) {
            $validatedData['report_type_id'] = 2;
            $route = redirect()->route('kejadian')->with('success', 'Laporan berhasil ditambahkan!');
        } elseif ($request->input('url_form') == route('hampir')) {
            $validatedData['report_type_id'] = 3;
            $route = redirect()->route('hampir')->with('success', 'Laporan berhasil ditambahkan!');
        }

        $report_type_name = ReportType::where('id', $validatedData['report_type_id'])->first();

        $workAccident = WorkAccident::create($validatedData);

        $notification = Notification::create([
            'user_id' => auth()->user()->id,
            'work_accident_id' => $workAccident->id,
            'work_accident_name' => $report_type_name->name,
            'icon' => '<i class="fas fa-circle-xmark text-danger"></i>'
        ]);

        if ($request->has('name')) {
            $validatedDataVictim = $request->validate([
                'name' => 'required',
                'address' => 'required',
                'age' => 'required',
                'gender' => 'required',
                'unit' => 'required',
                'type' => 'required'
            ]);

            $validatedDataVictim['work_accident_id'] = $workAccident->id;

            Victim::create($validatedDataVictim);
        }

        if ($request->hasFile('img_path')) {
            $validatedImage = $request->validate([
                'img_path.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            foreach ($request->file('img_path') as $image) {
                $validatedImage['img_path'] = $image->store('images');
                $validatedImage['work_accident_id'] = $workAccident->id;
                ImageFile::create($validatedImage);
            }
        }

        return $route;
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkAccident $workAccident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkAccident $workAccident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkAccidentRequest $request, WorkAccident $workAccident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkAccident $workAccident)
    {
        //
    }
}
