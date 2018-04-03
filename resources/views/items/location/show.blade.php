@extends('layout.layout')

@section('title', 'Lihat Locations')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="atasan">
                    <h4>
                        <a href="{{route('locations.index')}}">
                            <span style="color: black;" class="fa fa-angle-left"></span>
                        </a>&nbsp;Detail Location
                        <a href="{{route('locations.edit', $locations->id)}}" id="" class="btn btn-primary pull-right">Change Location Information</a>
                       
                    </h4>
                </div>
                <div class="space-20"></div>
                <div class="bgc-white p-20 bd">
                    <div class="isi">
                        <h2>
                            {{ $locations->location_name }}
                        </h2>
                        <div class="space-20"></div>
                        <p>{{ $locations->desc }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection