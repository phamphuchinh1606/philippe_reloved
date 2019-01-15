<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Auth;

class ItemController extends Controller
{
    private function showView($viewName, $params = []){
        return view('items.'.$viewName,$params);
    }

    public function index()
    {
        $items = $this->itemService->getList();
        return $this->showView('index',['items' => $items]);
    }

    public function showCreate(){
        $item = new Item();
        return $this->showView('create',['item' => $item]);
    }

    public function store(Request $request){
        $request->user_id = Auth::user()->id;
        $this->itemService->create($request);
        return redirect()->route('item.index');
    }

    public function showEdit($id){
        $item = $this->itemService->find($id);
        return $this->showView('edit',['item' => $item]);
    }

    public function edit($id, Request $request){
        $this->itemService->update($id,$request);
        return redirect()->route('item.index')->with('success', 'Item was edit successfully.');
    }

    public function delete($id){
        $this->itemService->delete($id);
        return redirect()->route('item.index')->with('success', 'Item was delete successfully.');
    }
}
