<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemPhotoController extends Controller
{
    public function create($itemId, Request $request){
        $this->itemPhotoService->create($itemId,$request);
        return redirect()->route('item.edit',['id' => $itemId]);
    }

    public function delete($itemId, $id){
        $this->itemPhotoService->delete($id);
        return redirect()->route('item.edit',['id' => $itemId]);
    }
}
