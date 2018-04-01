@extends('layout.layout')

@section('title', 'Ubah Role')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>
                    <a href="{{route('roles.index')}}">
                        <span style="color: black;" class="fa fa-angle-left"></span>
                    </a>&nbsp;Edit Roles
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
                          action="{{ route('roles.update', $role->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="display_name" class="text-normal">Display Name</label>
                            <input id="display_name" type="text" class="form-control" name="display_name"
                                   value="{{$role->display_name}}"
                                   required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="description" class="text-normal">Description</label>
                            <textarea rows="4" cols="50" name="description" id="description"
                                    class="form-control">{{$role->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="permission" class="text-normal">Permissions</label>
                            @foreach ($permissions as $permission)
                                <div class="form-check form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$permission->id}}"
                                       {{in_array($permission->id, $rolePermissions) ? "checked" : null}} name="permissions[]">
                                    <label class="form-check-label">{{$permission->display_name}}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a class="btn btn-link" href="{{ route('roles.index') }}">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection