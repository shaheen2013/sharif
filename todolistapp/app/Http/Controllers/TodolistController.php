<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\todolist;
use Illuminate\Http\JsonResponse;

class TodolistController extends Controller
{
    public function todos(){
        $todos = todolist::all();
        return $todos;
    }
    public function todo_create(Request $req){
        // dd($req);
        todolist::created($req);
        return response()->json($req);
    }
    public function delete($id){
        todolist::destroy($id);
        return response()->json("deleted");
    }
}
