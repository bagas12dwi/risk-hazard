<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Notification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $area = Area::all();
            $allNotif = count(Notification::all());
            $confirmNotif = count(Notification::where('status', 1)->get());
            $declineNotif = count(Notification::where('status', 0)->get());
            $revisiNotif = count(Notification::where('status', 2)->get());
            return view('admin.menu.dashboard.index', [
                'title' => 'Dahsboard',
                'areas' => $area,
                'disetujui' => "$confirmNotif / $allNotif",
                'ditolak' => "$declineNotif / $allNotif",
                'revisi' => "$revisiNotif / $allNotif",
            ]);
        } else if (auth()->user()->role == 'hse') {
            $area = Area::all();
            $allNotif = count(Notification::all());
            $confirmNotif = count(Notification::where('status', 1)->get());
            $declineNotif = count(Notification::where('status', 0)->get());
            $revisiNotif = count(Notification::where('status', 2)->get());
            return view('hse.dashboard.index', [
                'title' => 'Dahsboard',
                'areas' => $area,
                'disetujui' => "$confirmNotif / $allNotif",
                'ditolak' => "$declineNotif / $allNotif",
                'revisi' => "$revisiNotif / $allNotif",
            ]);
        } else if (auth()->user()->role == 'pelapor') {
            return view('menu.dashboard.index', [
                'title' => 'Dahsboard',
            ]);
        }
    }
}
