<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $unreadNotificationsCount = auth()->user()->unreadNotifications->count();

        // return view('partials.navbare_visitoure.nav', [
        //     'unreadNotificationsCount' => $unreadNotificationsCount
        // ]);
    }
}
