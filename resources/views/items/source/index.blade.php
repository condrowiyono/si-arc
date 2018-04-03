@extends('layout.layout')

@section('title', 'Manajemen Source')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h4>Source Item
                    <a  href="{{ route('sources.create') }}" class="pull-right btn btn-success">New Source</a>
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
                        @foreach ($sources as $source)

                            <tr class="">
                                <td>{{ $i++ }}</td>
                                <td><a href="{{route('sources.show',$source->id)}}"> {{ $source->source_name }}</a>
                                </td>
                                <td>{{ $source->add_information }}</td>
                                <td>
                                    <a href="{{ route('sources.edit',$source->id) }}" class="btn btn-default"><i class="fa fa-btn fa-pencil"></i></a>

                                    <form action="{{ route('sources.destroy',$source->id) }}" class="form-delete" method="POST" style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-task-{{ $source->id }}" class="btn btn-default">
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