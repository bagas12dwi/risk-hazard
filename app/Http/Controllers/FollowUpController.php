<?php

namespace App\Http\Controllers;

use App\Models\FollowUp;
use App\Http\Requests\StoreFollowUpRequest;
use App\Http\Requests\UpdateFollowUpRequest;
use App\Models\Notification;
use App\Models\WorkAccident;
use Illuminate\Http\Request;

class FollowUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $followUp = FollowUp::with('workAccident')->where('user_id', auth()->user()->id)->get();
        return view('hse.tindak-lanjut.index', [
            'title' => 'Tindak Lanjut',
            'followUp' => $followUp
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
    public function store(StoreFollowUpRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notifikasi)
    {
        $workAccident = WorkAccident::with('victim')->where('id', $notifikasi->work_accident_id)->first();
        return view('hse.tindak-lanjut.detail', [
            'title' => 'Tindak Lanjut',
            'notification' => $notifikasi,
            'workAccident' => $workAccident
        ]);
    }

    public function detail(FollowUp $followUp)
    {
        $workAccident = WorkAccident::with('victim')->where('id', $followUp->work_accident_id)->first();
        return view('hse.tindak-lanjut.show', [
            'title' => 'Tindak Lanjut',
            'notification' => $followUp,
            'workAccident' => $workAccident
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FollowUp $followUp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notifikasi)
    {
        $validatedData = $request->validate([
            'document_path' => 'required|mimetypes:application/pdf'
        ]);

        Notification::where('id', $notifikasi->id)->update([
            'is_approve_hse' => true,
            'hse_name' => auth()->user()->username,
            'icon' => '<i class="fas fa-clipboard-list text-warning"></i>'
        ]);

        $validatedData['work_accident_id'] = $notifikasi->work_accident_id;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['work_accident_name'] = $notifikasi->work_accident_name;
        $validatedData['icon'] = '<i class="fas fa-circle-xmark text-danger"></i>';
        $validatedData['document_path'] = $request->file('document_path')->store('document');

        FollowUp::create($validatedData);

        return redirect()->route('hse.inbox')->with('success', 'Laporan berhasil ditindak lanjut !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FollowUp $followUp)
    {
        //
    }
}
