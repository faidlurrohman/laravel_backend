<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrows;  
use App\Book;  

class BorrowController extends Controller
{
    public function BorrowsNotConfirm(){
        $matchData = ['borrowed' => true, 'confirmed' => false];
        $Borrows = Borrows::where($matchData)->get();
        return response()->json($Borrows, 201);
    }

    public function acceptBorrow(Request $request, Borrows $Borrows){
        $Borrows->where('id', $request->id)->update(['confirmed' => $request->confirmed]);
        return response()->json($Borrows, 200);
    } 

    public function declineBorrow(Request $request, Borrows $Borrows){
        $Borrows->where('id', $request->id)->update(['borrowed' => $request->borrowed]);
        Book::where('id', $request->book_id)->increment('qty',1);
        return response()->json($Borrows, 200);
    } 
    
    public function returnNotConfirm(){
        $matchData = ['returned' => true, 'confirmed' => false];
        $Borrows = Borrows::where($matchData)->get();
        return response()->json($Borrows, 201);
    }

    public function acceptReturn(Request $request, Borrows $Borrows){
        $Borrows->where('id', $request->id)->update(['returned' => $request->returned]);
        return response()->json($Borrows, 200);
    } 

    public function declineReturn(Request $request, Borrows $Borrows){
        $matchData = ['borrowed' => $request->borrowed, 'returned' => $request->returned, 'confirmed' => $request->confirmed];
        $Borrows->where('id', $request->id)->update($matchData);
        Book::where('id', $request->book_id)->decrement('qty',1);
        return response()->json($Borrows, 200);
    } 

    public function borrowRequest(Request $request){
        $Borrows = Borrows::create($request->all());
        Book::where('id', $Borrows->book_id)->decrement('qty',1);
        return response()->json($Borrows, 201);
    }

    public function borrowedBook(Request $request, Borrows $Borrows){
        $matchData = ['user_id' => $request->user_id, 'borrowed' => true, 'confirmed' => true];
        $Borrows = Borrows::where($matchData)->get();
        return response()->json($Borrows, 201);
    }

    public function returnRequest(Request $request, Borrows $Borrows){
        $matchData = ['borrowed' => $request->borrowed, 'returned' => $request->returned, 'confirmed' => $request->confirmed];
        $Borrows->where('id', $request->id)->update($matchData);
        Book::where('id', $request->book_id)->increment('qty',1);
        return response()->json($Borrows, 201);
    }
}
