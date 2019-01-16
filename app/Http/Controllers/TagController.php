<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    private function showView($viewName, $params = []){
        return view('tags.'.$viewName,$params);
    }

    public function index()
    {
        $tags = $this->tagService->getList();
        return $this->showView('index',['tags' => $tags]);
    }

    public function showCreate(){
        return $this->showView('create');
    }

    public function store(Request $request){
        $this->tagService->create($request);
        return redirect()->route('tag.index');
    }

    public function showEdit($id){
        $tag = $this->tagService->find($id);
        return $this->showView('edit',['tag' => $tag]);
    }

    public function edit($id, Request $request){
        $this->tagService->update($id,$request);
        return redirect()->route('tag.index')->with('success', 'Tag was edit successfully.');
    }

    public function delete($id){
        $this->tagService->delete($id);
        return redirect()->route('tag.index')->with('success', 'Tag was delete successfully.');
    }
}
