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
                            <a class="nav-link" href="{{route('profile.show',$user->name)}}">Data</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('profile.showContact',$user->name)}}">Contact</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" href="#">Division</a>
                          </li>
                        </ul>
                        <div class="mT-20">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4>Division </h4>
                                    <div class="row mY-20">
                                        <div class="col-md-3"> Divisi (Tahun) </div>
                                            @foreach($user->divisions as $division)
                                            <div class="col-md-7"> {{$division->division}} ({{$division->pivot->year}})</div>
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
@endsection
