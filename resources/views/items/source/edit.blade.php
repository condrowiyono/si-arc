@extends('layout.layout')

@section('title', 'Ubah Source')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>
                    <a href="{{route('sources.index')}}">
                        <span style="color: black;" class="fa fa-angle-left"></span>
                    </a>&nbsp;Edit Source Info
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
                          action="{{ route('sources.update', $sources->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="name" class="text-normal"> Name</label>
                            <input id="name" type="text" class="form-control" disabled name="name"
                                   value="{{$sources->source_name}}"
                                   required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="add_information" class="text-normal">add_information</label>
                            <textarea rows="4" cols="50" name="add_information" id="add_information"
                                    class="form-control">{{$sources->add_information}}</textarea>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a class="btn btn-link" href="{{ route('sources.index') }}">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection