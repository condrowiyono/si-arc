@extends('layout.layout')

@section('title', 'Profil')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="space-20"></div>
                <div class="bgc-white p-20 bd">
                    <div class="mB-20"> <h4><span class="fa fa-user"></span> {{$user->name}} </h4>
                    </div>
                    <div class="isi">
                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                            <a class="nav-link active" href="#">Data</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('profile.showContact',$user->name)}}">Contact</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('profile.showDivision',$user->name)}}">Division</a>
                          </li>
                        </ul>
                        <div class="mT-20">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="bgc-grey-200 p-20 bd">
                                        <img style="width: 100%; height: 100%;" class=" img-responsive" src="{{ Avatar::create($user->fullname)->toBase64() }}" />
                                    </div>
                                    @if ($user==Auth::user())
                                    <div>
                                        <a href="{{route('profile.edit',$user->name)}}" class="mT-10 btn btn-block btn-info" ><span class="fa fa-key-alt"></span>Change Profile</a>
                                        <a href="" class="mT-10 btn btn-block btn-default" ><span class="fa fa-key-alt"></span>Change Password</a>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <h5>Biodata </h5>
                                    <div class="row mY-20">
                                        <div class="col-md-3"> Name </div>
                                        <div class="col-md-7"> {{$user->name}}</div>
                                    </div>
                                    <div class="row mY-20">
                                        <div class="col-md-3"> Full Name </div>
                                        <div class="col-md-7"> {{$user->fullname}}</div>
                                    </div>
                                    <div class="row mY-20">
                                        <div class="col-md-3"> Born Date </div>
                                        <div class="col-md-7"> {{$user->born_date}}</div>
                                    </div>
                                    <div class="row mY-20">
                                        <div class="col-md-3"> Major </div>
                                        <div class="col-md-7"> 
                                            @if ($user->major !== null)
                                                {{\App\Major::where('code',$user->major)->first()->name}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mY-20">
                                        <div class="col-md-3"> Batch </div>
                                        <div class="col-md-7"> {{$user->batch}}</div>
                                    </div>
                                    <div class="row mY-20">
                                        <div class="col-md-3"> NIM (ID Number) </div>
                                        <div class="col-md-7"> {{$user->nim}}</div>
                                    </div>
                                    <h5>Contact </h5>
                                    <div class="row mY-20">
                                        <div class="col-md-3"> Email </div>
                                        <div class="col-md-7"> {{$user->email}}</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
