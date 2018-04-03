<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SourceController extends Controller
{
     public function __construct()
    {
        //Atur permission dulu
        $this->middleware('permission:source-create', ['only' => ['create', 'store']]);   
        $this->middleware('permission:source-list', ['only' => ['index', 'show']]);    
        $this->middleware('permission:source-update', ['only' => ['edit', 'update']]);   
        $this->middleware('permission:source-delete', ['only' => ['show', 'destroy']]);
    }
    public function index()
    {
        $sources = \App\Source::orderBy('id','DESC')->get();

        return view('items.source.index',compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.source.create');
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
            'name' => 'required|unique:sources,source_name',
            'add_information' => 'required',
        ]);

        $table = new \App\Source();
        $table->source_name = $request->input('name');
        $table->add_information = $request->input('add_information');
        $table->save();

        
        return redirect()->route('sources.index')
            ->with('success','Berhasil membuat Source ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sources = \App\Source::find($id);
        return view('items.source.show',compact('sources'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sources = \App\Source::find($id);
        return view('items.source.edit',compact('sources'));   
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
            'add_information' => 'required',
        ]);

        
        $table = \App\Source::find($id);
        // $table->location_name = $request->input('name');
        $table->add_information = $request->input('add_information');
        $table->save();


        return redirect()->route('sources.index')
            ->with('success','Berhasil memperbarui sources');
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
            \App\Source::find($id)->delete();
            return redirect()->route('sources.index')
                ->with('success','Berhasil menghapus sources');
        }catch(Exception $e){
            return redirect()->route('sources.index')
                ->with('success','Pastikan tidak ada ketergantungan');
        }
    }
}
