<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Exception;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $books = Book::select($request -> id)
            ->orderBy($request -> id)->groupBy();

            return response()->json($books);
        }
        catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $books = Book::create(
                [
                    'title'=> $request->title, 
                    'author'=>$request->author,
                    'release_year' => $request->release_year,
                    'isbn' => $request->isbn
                                         
                ]
            );
            $books->save();            
        }
        catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        try{
            $books = Book::find($id);
            
        } 
        catch (Exception $e) {
            return response()->json(['error' => $e -> getMessage()], 400);
        }
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
        try{
            $books = Book::find($id);
            $books->title = Book::get('title');
            $books->author = Book::get('author');
            $books->release_year = Book::get('release_year');
            $books->isbn = Book::get('isbn');
            $books->save();
        } catch (Exception $e) {
            return response()->json(['error' => $e -> getMessage()], 400);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $books = Book::find($id);
            $books->destroy();
            return $books;
        } catch (Exception $e) {
            return response()->json(['error' => $e -> getMessage()], 400);
        }
    }
}
