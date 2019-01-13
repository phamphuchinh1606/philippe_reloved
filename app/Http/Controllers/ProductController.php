<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private function showView($viewName, $params = []){
        return view('products.'.$viewName,$params);
    }

    public function index()
    {
        $products = $this->productService->getList();
        return $this->showView('index',['products' => $products]);
    }

    public function showCreate(){
        $productLevelOne = $this->productService->getList(array('level' => 0));
        return $this->showView('create',['productLevelOne' => $productLevelOne]);
    }

    public function store(Request $request){
        $this->productService->create($request);
        return redirect()->route('product.index');
    }

    public function showEdit($id){
        $brands = $this->brandService->getList();
        $model = $this->productService->find($id);
        return $this->showView('edit',['brands' => $brands, 'model' => $model]);
    }

    public function edit($id, Request $request){
        $this->productService->update($id,$request);
        return redirect()->route('model.index')->with('success', 'Model was edit successfully.');
    }

    public function delete($id){
        $this->productService->delete($id);
        return redirect()->route('model.index')->with('success', 'Model was delete successfully.');
    }
}
