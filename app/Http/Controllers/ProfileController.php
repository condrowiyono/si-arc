<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function show($username)
    {
        $user = \App\User::where('name',$username)->first();
        return view('profile.biodata',compact('user'));
    }

    public function showContact($username)
    {
        $user = \App\User::where('name',$username)->first();
        return view('profile.contact',compact('user'));
    }
    public function showDivision($username)
    {
        $user = \App\User::where('name',$username)->first();
        return view('profile.division',compact('user'));
    }


    public function edit($id)
    {
        $user = \App\User::find(Auth::user()->id);
        $major = \App\Major::all(); 
        $division = \App\Division::all(); 
        
        $listDivision ='<option value=""></option>';
        foreach ($division as $div)  {
            $listDivision .='<option value="'. $div->division .'">'. $div->division .'</option>';
        }
        
        
        return view('profile.edit',compact('user','major','division','listDivision'));
    }


    public function updateProfile(Request $request, $username)
    {
        $this->validate($request, [
            'fullname' => 'required|max:255',
        ]);


        $biodata = $request->only(['fullname', 'born_date','major','batch','nim']);
        $biodata['born_date'] = Carbon::parse($request['born_date'])->format('Y-m-d');
        $user = \App\User::find(Auth::user()->id);
        $user->update($biodata); //update the user info

        //Contact
        $phoneLists = explode(',',$request->input('phones'));
        $phoneIds = [];
        foreach($phoneLists as $phoneList)
        {
            $phone = \App\Phone::firstOrCreate(['phone'=>$phoneList]);
            if($phone)
            {
              $phoneIds[] = $phone->id;
            }

        }
        $user->phones()->sync($phoneIds);

        $emailLists = explode(',',$request->input('add_emails'));
        $emailIds = [];
        foreach($emailLists as $emailList)
        {
            $email = \App\Email::firstOrCreate(['email'=>$emailList]);
            if($email)
            {
              $emailIds[] = $email->id;
            }

        }
        $user->emails()->sync($emailIds);
        
        $addressLists = explode(',',$request->input('addresses'));
        $addressIds = [];
        foreach($addressLists as $addressList)
        {
            $address = \App\Address::firstOrCreate(['address'=>$addressList]);
            if($address)
            {
              $addressIds[] = $address->id;
            }

        }
        $user->addresses()->sync($addressIds);



        $soc = array();
        $soc_count = count($request['social_type']);
        for ($i=0; $i < $soc_count ; $i++) { 
            $soc += array($request['social_type'][$i] => $request['social_account'][$i] );
        }
        // return $soc;

        
        $socialIds = [];
        foreach ($soc as $key => $value) {
            $social = \App\Social::firstOrCreate(['type'=>$key,'account'=>$value]);
            if($social)
            {
              $socialIds[] = $social->id;
            }

        }
        $user->socials()->sync($socialIds);

        $div = array();
        $div_count = count($request['division_year']);

        for ($i=0; $i < $div_count ; $i++) { 
            $div += array($request['division_div'][$i] => $request['division_year'][$i] );
        }

        
        $divisionIds = [];
        foreach ($div as $key => $value) {
            $division = \App\Division::where('division',$key)->first();
            if($division)
            {
              $divisionIds += array($division->id => $value);
            }

        }
        $idnya = array();
        foreach ($divisionIds as $key => $value) {
            $idnya += array($key => array('year' => $value) ); 
        }

        $user->divisions()->sync($idnya);
        

        return redirect()->route('profile.show',$user->name);
    }
}



