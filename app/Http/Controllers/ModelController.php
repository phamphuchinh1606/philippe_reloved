<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelController extends Controller
{
    private function showView($viewName, $params = []){
        return view('models.'.$viewName,$params);
    }

    public function index()
    {
        $models = $this->modelService->getList()->load('brand');
        return $this->showView('index',['models' => $models]);
    }

    public function showCreate(){
        $brands = $this->brandService->getList();
        return $this->showView('create',['brands' => $brands]);
    }

    public function store(Request $request){
        $this->modelService->create($request);
        return redirect()->route('model.index');
    }

    public function showEdit($id){
        $brands = $this->brandService->getList();
        $model = $this->modelService->find($id);
        return $this->showView('edit',['brands' => $brands, 'model' => $model]);
    }

    public function edit($id, Request $request){
        $this->modelService->update($id,$request);
        return redirect()->route('model.index')->with('success', 'Model was edit successfully.');
    }

    public function delete($id){
        $this->modelService->delete($id);
        return redirect()->route('model.index')->with('success', 'Model was delete successfully.');
    }
}
