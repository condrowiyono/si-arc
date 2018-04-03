@extends('layout.layout')

@section('title', 'Buat Brands Baru')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4><a href="{{route('brands.index')}}">
                        <span style="color: black;" class="fa fa-angle-left"></span>
                    </a>&nbsp;Make Brands
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('brands.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="text-normal">Nama</label>
                            <input id="name" type="text" class="form-control" 
                                name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="text-normal">Deskripsi</label>
                            <textarea rows="4" cols="50" name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-link" href="{{ route('brands.index') }}">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection