<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //Atur permission dulu
        $this->middleware('permission:brand-create', ['only' => ['create', 'store']]);   
        $this->middleware('permission:brand-list', ['only' => ['index', 'show']]);    
        $this->middleware('permission:brand-update', ['only' => ['edit', 'update']]);   
        $this->middleware('permission:brand-delete', ['only' => ['show', 'destroy']]);
    }   
    public function index()
    {
        $brands = \App\Brand::orderBy('id','DESC')->get();

        return view('items.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.brand.create');
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
            'name' => 'required|unique:brands,brand_name',
            'description' => 'required',
        ]);

        $table = new \App\Brand();
        $table->brand_name = $request->input('name');
        $table->desc = $request->input('description');
        $table->save();

        
        return redirect()->route('brands.index')
            ->with('success','Berhasil membuat Brand ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brands = \App\Brand::find($id);
        return view('items.brand.show',compact('brands'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = \App\Brand::find($id);
        return view('items.brand.edit',compact('brands')); 
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

        
        $table = \App\Brand::find($id);
        
        $table->desc = $request->input('description');
        $table->save();


        return redirect()->route('brands.index')
            ->with('success','Berhasil memperbarui brands');
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
            \App\Brand::find($id)->delete();
            return redirect()->route('brands.index')
                ->with('success','Berhasil menghapus brands');
        }catch(Exception $e){
            return redirect()->route('brands.index')
                ->with('success','Pastikan tidak ada ketergantungan');
        }
    }
}
