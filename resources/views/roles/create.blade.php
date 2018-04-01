@extends('layout.layout')

@section('title', 'Buat Role Baru')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4><a href="{{route('roles.index')}}">
                        <span style="color: black;" class="fa fa-angle-left"></span>
                    </a>&nbsp;Buat Role Baru
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('roles.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="text-normal">Nama</label>
                            <input id="name" type="text" class="form-control" 
                                name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="display_name" class="text-normal">Tampilkan sebagai:</label>
                            <input id="name" type="text" class="form-control" 
                                name="display_name" value="{{ old('display_name') }}" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-normal">Deskripsi</label>
                            <textarea rows="4" cols="50" name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="permissions" class="text-normal">Permissions</label> <br>
                            @foreach ($permissions as $key => $permission)
                                <div class="form-check form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$key}}" name="permissions[]">
                                    <label class="form-check-label">{{$permission}}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-link" href="{{ route('roles.index') }}">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection