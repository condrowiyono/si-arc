@extends('layout.layout')

@section('title', 'Manajemen Inventory')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Inventory
                    <a  href="{{ route('items.create') }}" class="pull-right btn btn-success">New Item</a>
                </h4>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="space-20"></div>
                <div class="bgc-white p-20 bd">
                    <table style="font-size: 9pt" id="dataTable" class="table table-bordered table-condensed" data-form="deleteForm">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Location</th>
                            <th>Source</th>
                            <th>Owner</th>
                            <th>Date Enter</th>
                            <th>Condition</th>
                            <th>Value</th>
                            <th>Status</th>
                            <th class="table-action">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach ($items as $item)

                            <tr class="">
                                <td>{{ $item->item_code }}</td>
                                <td><a data-toggle="tooltip" data-placement="bottom" title="{{$item->specification}}" href="{{route('items.show',$item->id)}}"> {{ $item->item_name }}</a>
                                </td>
                                <td>{{ $item->brand->brand_name }}</td>
                                <td>{{ $item->location->location_name }}</td>
                                <td>{{ $item->source->source_name }}</td>
                                <td>{{ $item->owner->name }}</td>
                                <td>{{ $item->date_enter }}</td>
                                <td>{{ $item->condition }}</td>
                                <td>{{ $item->value }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ route('items.edit',$item->id) }}" class="btn btn-default"><i class="fa fa-btn fa-pencil"></i></a>

                                    <form action="{{ route('items.destroy',$item->id) }}" class="form-delete" method="POST" style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-task-{{ $item->id }}" class="btn btn-default">
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
<script type="text/javascript">
    $('[data-toggle="tooltip"]').tooltip();  
</script>
@endsection