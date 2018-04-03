@extends('layout.layout')

@section('title', 'Lihat Brand')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="atasan">
                    <h4>
                        <a href="{{route('brands.index')}}">
                            <span style="color: black;" class="fa fa-angle-left"></span>
                        </a>&nbsp;Detail Brand
                        <a href="{{route('brands.edit', $brands->id)}}" id="" class="btn btn-primary pull-right">Change Brand Information</a>
                       
                    </h4>
                </div>
                <div class="space-20"></div>
                <div class="bgc-white p-20 bd">
                    <div class="isi">
                        <h2>
                            {{ $brands->brand_name }}
                        </h2>
                        <div class="space-20"></div>
                        <p>{{ $brands->desc }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection