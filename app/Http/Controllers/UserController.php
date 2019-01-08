<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private function showView($viewName, $params = []){
        return view('users.'.$viewName,$params);
    }

    public function index()
    {
        $users = $this->userService->getList();
        return $this->showView('index',['users' => $users]);
    }

    public function showCreate(){
        return $this->showView('create');
    }

    public function store(Request $request){
        $this->userService->create($request);
        return redirect()->route('user.index');
    }

    public function showEdit($id){
        $venues = $this->venueService->getAllVenue();
        $event = $this->eventService->getEvent($id);
        if($event->start_date != null){
            $event->start_date = BeatsCityCommon::dateFormat($event->start_date,'d/m/Y');
        }
        if($event->end_date != null){
            $event->end_date = BeatsCityCommon::dateFormat($event->end_date,'d/m/Y');
        }
        return view('events.edit',[
            'event' => $event,
            'venues' => $venues
        ]);
    }

    public function edit($id, Request $request){
        $this->eventService->updateEvent($id,$request);
        return redirect()->route('event.index')->with('success', 'Event was edit successfully.');
    }
}
