<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    private function showView($viewName, $params = []){
        return view('statuses.'.$viewName,$params);
    }

    public function index()
    {
        $statuses = $this->statusService->getList();
        return $this->showView('index',['statuses' => $statuses]);
    }

    public function showCreate(){
        return $this->showView('create');
    }

    public function store(Request $request){
        $this->statusService->create($request);
        return redirect()->route('status.index');
    }

    public function showEdit($id){
        $status = $this->statusService->find($id);
        return $this->showView('edit',['status' => $status]);
    }

    public function edit($id, Request $request){
        $this->statusService->update($id,$request);
        return redirect()->route('status.index')->with('success', 'Status was edit successfully.');
    }

    public function delete($id){
        $this->statusService->delete($id);
        return redirect()->route('status.index')->with('success', 'Status was delete successfully.');
    }
}
