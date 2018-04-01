@extends('layout.layout')

@section('title', 'Lihat Role')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="atasan">
                    <h4>
                        <a href="{{route('roles.index')}}">
                            <span style="color: black;" class="fa fa-angle-left"></span>
                        </a>&nbsp;Detil Role
                        <a href="{{route('roles.edit', $role->id)}}" id="" class="btn btn-primary pull-right">Ubah Role</a>
                       
                    </h4>
                </div>
                <div class="space-20"></div>
                <div class="bgc-white p-20 bd">
                    <div class="isi">
                        <h2>
                            {{ $role->display_name }}
                        </h2>
                        <div class="space-20"></div>
                        <p>{{ $role->description }}</p>
                        
                        <table class="table table-borderless">
                            <tr>
                                <td> Permissions</td>
                                <td>
                                    @if(!empty($permissions))
                                        <div class="col-md-8 control-label">
                                            @foreach($permissions as $permission)
                                                <span class="tag">{{ $permission->display_name }}</span>
                                            @endforeach
                                        </div>
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