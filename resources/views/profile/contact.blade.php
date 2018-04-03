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
                            <a class="nav-link " href="{{route('profile.show',$user->name)}}">Data</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" href="#">Contact</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('profile.showDivision',$user->name)}}">Division</a>
                          </li>
                        </ul>
                        <div class="mT-20">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4>Contact </h4>
                                    <h5>Phones</h5>
                                    <div class="row mY-20">
                                        <div class="col-md-3"> Phone </div>
                                        <div>
                                            @foreach($user->phones as $phone)
                                            <div class="col-md-7"> {{$phone->phone}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <h5>Additional Email</h5>
                                    <div class="row mY-20">
                                        <div class="col-md-3"> Emails </div>
                                        <div>
                                            @foreach($user->emails as $email)
                                            <div class="col-md-7"> {{$email->email}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <h5>Address</h5>
                                    <div class="row mY-20">
                                        <div class="col-md-3"> Address </div>
                                        <div>
                                            @foreach($user->addresses as $address)
                                            <div class="col-md-7"> {{$address->address}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <h5>Social Media Account</h5>
                                    <div class="row mY-20">
                                        <div class="col-md-3"> Social </div>
                                        <div class="col-md-7">
                                            @foreach($user->socials as $social)
                                            <div class=""> 
                                                <span class="fa fa-{{$social->type}}"></span>
                                                {{$social->account}}
                                            </div>
                                            @endforeach
                                        </div>
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
