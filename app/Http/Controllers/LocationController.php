<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //Atur permission dulu
        $this->middleware('permission:location-create', ['only' => ['create', 'store']]);   
        $this->middleware('permission:location-list', ['only' => ['index', 'show']]);    
        $this->middleware('permission:location-update', ['only' => ['edit', 'update']]);   
        $this->middleware('permission:location-delete', ['only' => ['show', 'destroy']]);
    }
    public function index()
    {
        $locations = \App\Location::orderBy('id','DESC')->get();

        return view('items.location.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:locations,location_name',
            'description' => 'required',
        ]);

        $table = new \App\Location();
        $table->location_name = $request->input('name');
        $table->desc = $request->input('description');
        $table->save();

        
        return redirect()->route('locations.index')
            ->with('success','Berhasil membuat Location ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locations = \App\Location::find($id);
        return view('items.location.show',compact('locations'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locations = \App\Location::find($id);
        return view('items.location.edit',compact('locations'));   
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
        $this->validate($request, [
            'description' => 'required',
        ]);

        
        $table = \App\Location::find($id);
        // $table->location_name = $request->input('name');
        $table->desc = $request->input('description');
        $table->save();


        return redirect()->route('locations.index')
            ->with('success','Berhasil memperbarui locations');
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
            \App\Location::find($id)->delete();
            return redirect()->route('locations.index')
                ->with('success','Berhasil menghapus locations');
        }catch(Exception $e){
            return redirect()->route('locations.index')
                ->with('success','Pastikan tidak ada ketergantungan');
        }
    }
}
