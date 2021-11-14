<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            "status" => "200",
            "message" => "Load data success",
            "data" => Author::all()
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Author::create([
            "name"=> $request->name,
            "date_of_birth"=> $request->date_of_birth,
            "place_of_birth"=> $request->place_of_birth,
            "gender"=> $request->gender,
            "email"=> $request->email,
            "hp"=> $request->hp,
        ]);
        return [
            "status" => "201",
            "message" => "Create Data Success",
            "data" => $data
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
        $data = Author::find($id);
        if($data){
            return [
                "status" => "200",
                "message" => "Show Data Detail Success",
                "data" => $data
            ];
        }else{
            return [
                "status" => "404",
                "message" => "Data Not Found",
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
        $data = Author::find($id);

        $data -> name = $request->name;
        $data -> date_of_birth = $request->date_of_birth;
        $data -> place_of_birth = $request->place_of_birth;
        $data -> gender = $request->gender;
        $data -> email = $request->email;
        $data -> hp = $request->hp;

        $data->save();

        return "Update Data Succsess";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Author::find($id);

        if($data){
            $data->delete();
            return[
                "status" => "204",
                "message" => "Remove success"
            ];
        }else{
            return[
                "status" => "404",
                "message" => "Data not found"
            ];
        } 
    }
}
