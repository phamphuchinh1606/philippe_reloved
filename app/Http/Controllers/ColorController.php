<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColorController extends Controller
{
    private function showView($viewName, $params = []){
        return view('colors.'.$viewName,$params);
    }

    public function index()
    {
        $colors = $this->colorService->getList();
        return $this->showView('index',['colors' => $colors]);
    }

    public function showCreate(){
        return $this->showView('create');
    }

    public function store(Request $request){
        $this->colorService->create($request);
        return redirect()->route('color.index');
    }

    public function showEdit($id){
        $color = $this->colorService->find($id);
        return $this->showView('edit',['color' => $color]);
    }

    public function edit($id, Request $request){
        $this->colorService->update($id,$request);
        return redirect()->route('color.index')->with('success', 'Color was edit successfully.');
    }

    public function delete($id){
        $this->colorService->delete($id);
        return redirect()->route('color.index')->with('success', 'Color was delete successfully.');
    }
}
