@extends('layout.layout')

@section('title', 'Lihat Source')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="atasan">
                    <h4>
                        <a href="{{route('sources.index')}}">
                            <span style="color: black;" class="fa fa-angle-left"></span>
                        </a>&nbsp;Detail Source
                        <a href="{{route('sources.edit', $sources->id)}}" id="" class="btn btn-primary pull-right">Change Source Information</a>
                       
                    </h4>
                </div>
                <div class="space-20"></div>
                <div class="bgc-white p-20 bd">
                    <div class="isi">
                        <h2>
                            {{ $sources->source_name }}
                        </h2>
                        <div class="space-20"></div>
                        <p>{{ $sources->add_information }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection