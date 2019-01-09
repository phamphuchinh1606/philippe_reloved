<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellingStatusController extends Controller
{
    private function showView($viewName, $params = []){
        return view('sellingStatuses.'.$viewName,$params);
    }

    public function index()
    {
        $statuses = $this->sellingStatusSevice->getList();
        return $this->showView('index',['statuses' => $statuses]);
    }

    public function showCreate(){
        return $this->showView('create');
    }

    public function store(Request $request){
        $this->sellingStatusSevice->create($request);
        return redirect()->route('selling_status.index');
    }

    public function showEdit($id){
        $status = $this->sellingStatusSevice->find($id);
        return $this->showView('edit',['status' => $status]);
    }

    public function edit($id, Request $request){
        $this->sellingStatusSevice->update($id,$request);
        return redirect()->route('selling_status.index')->with('success', 'Selling Status was edit successfully.');
    }

    public function delete($id){
        $this->sellingStatusSevice->delete($id);
        return redirect()->route('selling_status.index')->with('success', 'Selling Status was delete successfully.');
    }
}
