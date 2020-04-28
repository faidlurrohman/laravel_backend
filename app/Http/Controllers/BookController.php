<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;  

class BookController extends Controller
{
    public function index(){
        return Book::all();
    }
 
    public function show(Book $Book){
        return $Book;
    }
 
    public function store(Request $request){
        $Book = Book::create($request->all());
        return response()->json($Book, 201);
    }
 
    public function update(Request $request, Book $Book){
        $Book->update($request->all());
        return response()->json($Book, 200);
    }
 
    public function delete(Book $Book){
        $Book->delete();
        return response()->json(null, 204);
    }
}
