<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::get();
    	return [
            'status' => '200 OK',
            'message' => 'data terload',
            'data' => $books,
        ];
        // $books = Book::paginate(20);
        // return BookResource::collection($books);
    }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // title, description. author. publisher. date_of_issue
    {
        $bookStore = new Book;
        $bookStore->title = $request->title;
        $bookStore->description = $request->description;
        $bookStore->author = $request->author;
        $bookStore->publisher = $request->publisher;
        $bookStore->date_of_issue = $request->date_of_issue;
        $bookStore->save();
        return [
            'status' => '200 OK',
            'message' => 'Data berhasil ditambah',
            'data' => $bookStore,
        ];  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        if($book == null){
            return [
                'status' => '200 OK',
                'message' => "Tidak ada data dengan id $id",    
            ];   
        } else {
        return [
            'status' => '200 OK',
            'message' => 'Data terload',
            'data' => $book,
        ];   
        }
    }
    public function search($title)
    {
        $book = Book::where('title','LIKE',"%$title%")->get();
        if(count($book) > 0){
            return [
                'status' => '200 OK',
                'message' => 'Data successful loaded',
                'data' => $book,
            ];      
        } else {
            return [
                'status' => '404',
                'message' => "Tidak ada data dengan title $title",    
            ];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if($book == null){
            return [
                'status' => '200 OK',
                'message' => "Tidak ada data dengan id $id",    
            ];   
        } else {
            $book->update($request->all());
            return response([
                'data' => new BookResource($book), 
                'message' => 'Update successfully',
                'status' => '200 OK'],
                 200);
        }
        // $books = Book::findOrFail($id);
        // $books->title = $request->title;
        // $books->description = $request->description;
        // $books->author = $request->author;
        // $books->publisher = $request->publisher;
        // $books->date_of_issue = $request->date_of_issue;
        // if($books->save()){
        //     return new BookResource($books);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $book = Book::find($id);
        if($book == null){
            return [
                'status' => '200 OK',
                'message' => "Tidak ada data dengan id $id",    
            ];   
        } else {
            $book->delete();
            return response([
                'data' => new BookResource($book), 
                'message' => 'Delete successfully',
                'status' => '200 OK'],
                 200);
        }
    }
}
