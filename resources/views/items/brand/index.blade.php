@extends('layout.layout')

@section('title', 'Manajemen Brand')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h4>Brand Item
                    <a  href="{{ route('brands.create') }}" class="pull-right btn btn-success">New Brand</a>
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
                        @foreach ($brands as $brand)

                            <tr class="">
                                <td>{{ $i++ }}</td>
                                <td><a href="{{route('brands.show',$brand->id)}}"> {{ $brand->brand_name }}</a>
                                </td>
                                <td>{{ $brand->desc }}</td>
                                <td>
                                    <a href="{{ route('brands.edit',$brand->id) }}" class="btn btn-default"><i class="fa fa-btn fa-pencil"></i></a>

                                    <form action="{{ route('brands.destroy',$brand->id) }}" class="form-delete" method="POST" style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-task-{{ $brand->id }}" class="btn btn-default">
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