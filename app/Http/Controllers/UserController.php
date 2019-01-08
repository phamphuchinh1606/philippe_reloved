<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private function showView($viewName, $params = []){
        return view('users.'.$viewName,$params);
    }

    public function index()
    {
        $users = $this->userService->getList();
        return $this->showView('index',['users' => $users]);
    }

    public function showCreate(){
        return $this->showView('create');
    }

    public function store(Request $request){
        $this->userService->create($request);
        return redirect()->route('user.index');
    }

    public function showEdit($id){
        $user = $this->userService->find($id);
        return $this->showView('edit',['user' => $user]);
    }

    public function edit($id, Request $request){
        $this->userService->update($id,$request);
        return redirect()->route('user.index')->with('success', 'User was edit successfully.');
    }

    public function delete($id){
        $this->userService->delete($id);
        return redirect()->route('user.index')->with('success', 'User was delete successfully.');
    }
}
