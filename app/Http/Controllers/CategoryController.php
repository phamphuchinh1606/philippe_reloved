<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private function showView($viewName, $params = []){
        return view('categories.'.$viewName,$params);
    }

    public function index()
    {
        $categories = $this->categoryService->getList();
        return $this->showView('index',['categories' => $categories]);
    }

    public function showCreate(){
        return $this->showView('create');
    }

    public function store(Request $request){
        $this->categoryService->create($request);
        return redirect()->route('category.index');
    }

    public function showEdit($id){
        $category = $this->categoryService->find($id);
        return $this->showView('edit',['category' => $category]);
    }

    public function edit($id, Request $request){
        $this->categoryService->update($id,$request);
        return redirect()->route('category.index')->with('success', 'Category was edit successfully.');
    }

    public function delete($id){
        $this->categoryService->delete($id);
        return redirect()->route('category.index')->with('success', 'Category was delete successfully.');
    }
}
