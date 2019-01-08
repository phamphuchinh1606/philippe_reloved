<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    private function showView($viewName, $params = []){
        return view('brands.'.$viewName,$params);
    }

    public function index()
    {
        $brands = $this->brandService->getList();
        return $this->showView('index',['brands' => $brands]);
    }

    public function showCreate(){
        return $this->showView('create');
    }

    public function store(Request $request){
        $this->brandService->create($request);
        return redirect()->route('brand.index');
    }

    public function showEdit($id){
        $user = $this->userService->find($id);
        return $this->showView('edit',['user' => $user]);
    }

    public function edit($id, Request $request){
        $this->userService->update($id,$request);
        return redirect()->route('user.index')->with('success', 'User was edit successfully.');
    }
}
