@extends('layout.layout')

@section('title', 'Ubah User')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>
                    <a href="{{route('users.index')}}">
                        <span style="color: black;" class="fa fa-angle-left"></span>
                    </a>&nbsp;Edit Users
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update', $user->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="name" class="text-normal">Nama</label>
                            <input id="display_name" type="text" class="form-control" name="name"
                                   value="{{$user->name}}" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="fullname" class="text-normal">Nama Lengkap</label>
                            <input id="fullname" type="text" class="form-control" name="fullname" value="{{$user->fullname}}" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-normal">E-Mail</label>
                            <input id="email" type="text" class="form-control" name="email"
                                   value="{{$user->email}}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-normal">Password</label>
                            <input id="password" type="password" class="form-control" name="password" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="text-normal">Konfirmasi Password</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" autofocus>   
                        </div>


                        <div class="form-group">
                            <label for="roles" class="text-normal">Roles</label>
                            <select id="role" name="roles[]" class="form-control" multiple>
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}" {{in_array($role->id, $userRoles) ? "selected" : null}}>
                                        {{$role->display_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">    
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a class="btn btn-link" href="{{ route('users.index') }}">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection