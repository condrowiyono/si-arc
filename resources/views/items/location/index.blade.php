@extends('layout.layout')

@section('title', 'Manajemen Location')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h4>Location Item ( Self)
                    <a  href="{{ route('locations.create') }}" class="pull-right btn btn-success">New Location</a>
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
                        @foreach ($locations as $location)

                            <tr class="">
                                <td>{{ $i++ }}</td>
                                <td><a href="{{route('locations.show',$location->id)}}"> {{ $location->location_name }}</a>
                                </td>
                                <td>{{ $location->desc }}</td>
                                <td>
                                    <a href="{{ route('locations.edit',$location->id) }}" class="btn btn-default"><i class="fa fa-btn fa-pencil"></i></a>

                                    <form action="{{ route('locations.destroy',$location->id) }}" class="form-delete" method="POST" style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-task-{{ $location->id }}" class="btn btn-default">
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