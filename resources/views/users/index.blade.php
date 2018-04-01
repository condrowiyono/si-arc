@extends('layout.layout')

@section('title', 'Manajemen User')
@section('sb-users', 'active')
@section('mainContent')
    <div class="container">   
        <div class="row">
            <div class="col-md-12">
                <h4>User
                    <a  href="{{ route('users.create') }}" class="pull-right btn btn-success">Tambah User</a>
                </h4>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="space-20"></div>
                <div class="bgc-white p-20 bd">
                    <div class="user-table">
                    <div style="color: black;">
                        Roles
                        @foreach ($role as $key)
                        <div class="form-check form-check-inline">
                            <input  onchange="filterme()" class="filterrole form-check-input" type="checkbox" name="role" value="{{$key->display_name}}">
                            <label class="form-check-label" for="">{{$key->display_name}}</label>
                        </div>
                        @endforeach
                    </div>
                    
                    <table id="example" class="table table-bordered table-condensed" data-form="deleteForm">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Roles</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th class="table-action">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php ($i = 1)
                        @foreach ($users as $key => $user)
                            <tr class="list-users">
                                <td>{{ $i++ }}</td>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" class="font-weight-bold">{{ $user->name }}</a>
                                </td>
                                
                                <td>
                                    @if(!empty($user->roles))
                                        @foreach($user->roles as $role)
                                            <label class="tag">{{ $role->display_name }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $user->fullname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <label class='toggler__label'>
                                        <input class="activetoogle" id="{{ $user->id }}" name="active" type="checkbox" hidden {{($user->active) ? 'checked' : ''}} >
                                        <div class='toggler'></div>
                                    </label>
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-default"><i class="fa fa-btn fa-pencil"></i></a>

                                    <form id="destroy{{$user->id}}" class="form-delete" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-task-{{ $user->id }}" class="btn btn-default">
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
    </div>
@endsection
@section('page-script')
@include('layout.deleteConfirmation')
<script type="text/javascript">
//TOC--------------------------------------
//1. Define and Filter Data Tables
//-----------------------------------------

//1. Data Table----------------------------
//listen and convert table to data table
otable = $('#example').dataTable();

//if filter checkbock checked
function filterme() {
  //build a regex filter string with an or(|) condition
  var roles = $('.filterrole:checked').map(function() {
    return '' + this.value + '' ;
  }).get().join('|');
  console.log(roles);
  //filter in column 0, with an regex, no smart filtering, no inputbox,not case sensitive
  otable.fnFilter(roles, 2, true, false, false, false);
}


</script>
@endsection

