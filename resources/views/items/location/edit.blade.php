@extends('layout.layout')

@section('title', 'Ubah Location')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>
                    <a href="{{route('locations.index')}}">
                        <span style="color: black;" class="fa fa-angle-left"></span>
                    </a>&nbsp;Edit Location Info
                </h4>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Perhatian!</strong> Terdapat kesalahan dalam masukan<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="space-20"></div>
                <div class="bgc-white p-20 bd">

                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ route('locations.update', $locations->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="name" class="text-normal"> Name</label>
                            <input id="name" type="text" class="form-control" disabled name="name"
                                   value="{{$locations->location_name}}"
                                   required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="description" class="text-normal">Description</label>
                            <textarea rows="4" cols="50" name="description" id="description"
                                    class="form-control">{{$locations->desc}}</textarea>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a class="btn btn-link" href="{{ route('locations.index') }}">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection