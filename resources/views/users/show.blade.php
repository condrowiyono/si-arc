@extends('layout.layout')

@section('title', 'Lihat User')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="atasan">
                    <h4>
                        <a href="{{route('users.index')}}">
                            <span style="color: black;" class="fa fa-angle-left"></span>
                        </a>&nbsp;Detil User
                        <a href="{{route('users.edit', $user->id)}}" id="" class="btn btn-primary pull-right">Ubah Data User</a>
                       
                    </h4>
                </div>
                <div class="space-20"></div>
                <div class="bgc-white p-20 bd">
                    <div class="isi">
                        <h2>
                            {{ $user->fullname }} <small> ({{$user->name}})</small>
                        </h2>
                        
                        <table class="table table-borderless">
                            <tr>
                                <td >Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td> Roles</td>
                                <td>
                                @if(!empty($user->roles))
                                    @foreach($user->roles as $role)
                                        <span class="tag">{{ $role->display_name }}</span>
                                    @endforeach
                                @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection