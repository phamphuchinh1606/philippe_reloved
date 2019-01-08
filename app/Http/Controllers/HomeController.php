<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homes.home');
    }

    public function dashboard(Request $request)
    {
        $listEvent = $this->eventService->getListEventShow();
        return view('admin.dashboard',[
            'listEvent' => $listEvent
        ]);
    }
}
