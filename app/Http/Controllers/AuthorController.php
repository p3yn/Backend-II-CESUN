<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Exception;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        try{
        $authors = Author::all();
        return $authors;
        }
        catch (Exception $e) {
            return response()->json(['error' => $e -> getMessage()], 400);
        }
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try{
            $authors = new Author();
            $authors -> name = $request -> name;

            $authors -> save();
        }
        catch(Exception $e){
            return response()->json(['error' => $e -> getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        try{
            $author = Author::find($id);
            
        } 
        catch (Exception $e) {
            return response()->json(['error' => $e -> getMessage()], 400);
        }
        return Author::findOrFail($id);
    }
}
