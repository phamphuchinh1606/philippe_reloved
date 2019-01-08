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
        $brand = $this->brandService->find($id);
        return $this->showView('edit',['brand' => $brand]);
    }

    public function edit($id, Request $request){
        $this->brandService->update($id,$request);
        return redirect()->route('brand.index')->with('success', 'Brand was edit successfully.');
    }

    public function delete($id){
        $this->brandService->delete($id);
        return redirect()->route('brand.index')->with('success', 'Brand was delete successfully.');
    }
}
