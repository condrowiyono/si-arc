@extends('layout.layout')

@section('title', 'Manajemen Role')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Role Manager
                    <a  href="{{ route('roles.create') }}" class="pull-right btn btn-success">Tambah Role</a>
                </h4>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="space-20"></div>
                <div class="bgc-white p-20 bd">
                    <table id="dataTable" class="table table-bordered table-condensed" data-form="deleteForm">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="table-action">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach ($roles as $role)

                            <tr class="">
                                <td>{{ $i++ }}</td>
                                <td><a href="{{ route('roles.show',$role->id) }}" class="font-weight-bold" >{{ $role->display_name }}</a>
                                </td>
                                
                                <td>{{ $role->description }}</td>
                                <td>
                                    
                                    <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-default"><i class="fa fa-btn fa-pencil"></i></a>

                                    <form action="{{ route('roles.destroy',$role->id) }}" class="form-delete" method="POST" style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-task-{{ $role->id }}" class="btn btn-default">
                                            <i class="fa fa-btn fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
@include('layout.deleteConfirmation')
@endsection