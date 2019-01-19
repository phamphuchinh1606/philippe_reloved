<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class SaleItemController extends Controller
{
    private function showView($viewName, $params = []){
        return view('saleItems.'.$viewName,$params);
    }
    private function getSearchInfo(Request $request){
        $searchForm = $request->only([
            'status_id', 'brand_id', 'category_id', 'product_id', 'page'
        ]);
        if(count($searchForm) == 0){
            $searchForm = array(
                'status_id' => null,
                'brand_id' => null,
                'category_id' => null,
                'email' => null,
                'product_id' => null
            );
        }
        return $searchForm;
    }


    public function index(Request $request)
    {
        $searchForm = $this->getSearchInfo($request);
        $items = $this->itemService->getList($searchForm);
        return $this->showView('index',['items' => $items, 'searchForm' => $searchForm]);
    }

    public function showCreate(){
        $item = new Item();
        return $this->showView('create',['item' => $item]);
    }

    public function store(Request $request){
        $request->user_id = Auth::user()->id;
        $this->itemService->create($request);
        return redirect()->route('sale_item.index');
    }

    public function showEdit($id){
        $item = $this->itemService->find($id);
        return $this->showView('edit',['item' => $item]);
    }

    public function edit($id, Request $request){
        $this->itemService->update($id,$request);
        return redirect()->route('sale_item.index')->with('success', 'Item was edit successfully.');
    }

    public function delete($id){
        $this->itemService->delete($id);
        return redirect()->route('sale_item.index')->with('success', 'Item was delete successfully.');
    }
}
