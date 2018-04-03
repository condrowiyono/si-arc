<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function __construct()
    {
        //Atur permission dulu
        $this->middleware('permission:item-create', ['only' => ['create', 'store']]);   
        $this->middleware('permission:item-list', ['only' => ['index', 'show']]);    
        $this->middleware('permission:item-update', ['only' => ['edit', 'update']]);   
        $this->middleware('permission:item-delete', ['only' => ['show', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \App\Item::all() ;
        return view('items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = \App\User::all();
        $locations = \App\Location::all();
        $brands = \App\Brand::all();
        $sources = \App\Source::all();

        return view('items.create',compact('users','locations','brands','sources'));
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
            'owner' => 'required',
            'brand' => 'required',
            'item_code' => 'required',
            'item_name' => 'required',
            'specification' => 'required',
            'location' => 'required',
            'source' => 'required',
            'date_enter' => 'required',
            'condition' => 'required',
            'value' => 'required',
        ]);

        $input = $request->except('_token');
        $input['user_id'] = Auth::user()->id;
        $input['owner_id'] = $input['owner'];
        $input['brand_id'] = $input['brand'];
        $input['location_id'] = $input['location'];
        $input['source_id'] = $input['source'];
        $input['date_enter'] = Carbon::parse($input['date_enter'])->format('Y-m-d');        

        $table = \App\Item::create($input);


        return redirect()->route('items.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = \App\Item::find($id);

        return view('items.show', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = \App\User::all();
        $locations = \App\Location::all();
        $brands = \App\Brand::all();
        $sources = \App\Source::all();
        $items = \App\Item::find($id);

        return view('items.edit',compact('items','users','locations','brands','sources'));
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
            'owner' => 'required',
            'brand' => 'required',
            'item_code' => 'required',
            'item_name' => 'required',
            'specification' => 'required',
            'location' => 'required',
            'source' => 'required',
            'date_enter' => 'required',
            'condition' => 'required',
            'value' => 'required',
        ]);

        $input = $request->except('_token');
        $input['user_id'] = Auth::user()->id;
        $input['owner_id'] = $input['owner'];
        $input['brand_id'] = $input['brand'];
        $input['location_id'] = $input['location'];
        $input['source_id'] = $input['source'];
        $input['date_enter'] = Carbon::parse($input['date_enter'])->format('Y-m-d');        

        
        $table = \App\Item::find($id);
        $table->update($input);


        return redirect()->route('items.index')->with('success','Berhasil mengubah items');
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
            \App\Item::find($id)->delete();
            return redirect()->route('items.index')
                ->with('success','Berhasil menghapus user');
        }catch(Exception $e){
            return redirect()->route('items.index')
                ->with('success','Pastikan tidak ada ketergantungan');
        }
    }
}
