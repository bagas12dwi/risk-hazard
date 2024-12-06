<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use App\Models\FollowUp;
use App\Models\WorkAccident;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kotak Masuk';
        if (auth()->user()->role == 'pelapor') {
            $notification = Notification::with('workAccident')->where('user_id', auth()->user()->id)->get();
            return view('menu.inbox.index', [
                'title' => $title,
                'notifications' => $notification
            ]);
        } elseif (auth()->user()->role == 'hse') {
            $notification = Notification::with('workAccident')->get();
            return view('hse.inbox.index', [
                'title' => $title,
                'notifications' => $notification
            ]);
        } elseif (auth()->user()->role == 'admin') {
            $notification = Notification::with('workAccident')->where('is_approve_hse', true)->get();
            return view('admin.menu.inbox.index', [
                'title' => $title,
                'notifications' => $notification
            ]);
        }
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
    public function store(StoreNotificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notifikasi)
    {
        $workAccident = WorkAccident::with(['victim', 'images'])->where('id', $notifikasi->work_accident_id)->first();
        $followUp = FollowUp::where('work_accident_id', $notifikasi->work_accident_id)->first();
        if (auth()->user()->role == 'hse') {
            return view('hse.inbox.detail', [
                'title' => 'Detail',
                'workAccident' => $workAccident,
                'notification' => $notifikasi,
                'followUp' => $followUp
            ]);
        } elseif (auth()->user()->role == 'admin') {
            return view('admin.menu.inbox.detail', [
                'title' => 'Detail',
                'workAccident' => $workAccident,
                'notification' => $notifikasi,
                'followUp' => $followUp
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notifikasi)
    {
        $validatedData = $request->validate([
            'status' => 'required'
        ]);

        $route = '';

        if (auth()->user()->role == 'hse') {
            if ($validatedData['status'] == 0) {
                $validatedData['is_approve_hse'] = false;
            } else {
                $validatedData['is_approve_hse'] = true;
            }
            $validatedData['hse_name'] = auth()->user()->username;
            $route = redirect()->route('hse.inbox')->with('success', 'Berhasil mengkonfirmasi laporan!');
        } else {
            if ($validatedData['status'] == 0) {
                $validatedData['is_approve_admin'] = false;
                $validatedData['icon'] = '<i class="fas fa-circle-xmark text-danger"></i>';
            } else {
                $validatedData['is_approve_admin'] = true;
                $validatedData['icon'] = '<i class="fas fa-check-circle text-success"></i>';
            }
            $validatedData['admin_name'] = auth()->user()->username;

            FollowUp::where('work_accident_id', $notifikasi->work_accident_id)->update([
                'is_approve_admin' => true,
                'admin_name' => auth()->user()->username,
                'status' => $validatedData['status'],
                'icon' => $validatedData['icon']
            ]);
            $route = redirect()->route('admin.inbox')->with('success', 'Berhasil mengkonfirmasi laporan !');
        }

        Notification::where('id', $notifikasi->id)->update($validatedData);
        return $route;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
