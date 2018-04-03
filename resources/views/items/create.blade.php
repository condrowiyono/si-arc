@extends('layout.layout')

@section('title', 'Create Items')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Create Item
                    <a href="" id="submit-a" class="pull-right btn btn-success">Save</a>
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
                <form id="form-profile" class="" role="form" method="POST" action="{{ route('items.store') }}">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="bgc-white p-20 bd">
                                <h5>Data </h5>
                                <div class="form-group row">
                                    <label for="user" class="col-md-4 text-normal">Created by</label>
                                    <div class="col-md-7">
                                    <input id="user" type="text" class="form-control" name="name"
                                           value="{{Auth::user()->name}}" disabled required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="owner" class="text-normal col-md-4">Owner</label>
                                    <div class="col-md-7">
                                        <select autofocus id="owner" name="owner" data-dependentfields="" class="selectize input-sm form-control">
                                            <option value=""></option>
                                            @foreach ($users as $user)
                                            <option value="{{$user->id}}" {{$user->id==Auth::user()->id ? 'selected' : ''}}>{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> 
                                
                                <div class="form-group row">
                                    <label for="brand" class="text-normal col-md-4">Brand</label>
                                    <div class="col-md-7">    
                                        <select autofocus id="brand" name="brand" data-dependentfields="" class="selectize input-sm form-control input-group-prepend">
                                            @foreach ($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="item_code" class="col-md-4 text-normal">item_code</label>
                                    <div class="col-md-7">
                                    <input id="item_code" type="text" class="form-control" name="item_code"
                                           value="{{old('item_code')}}" required>
                                    </div>
                                </div> 
                                 <div class="form-group row">
                                    <label for="item_name" class="col-md-4 text-normal">item_name</label>
                                    <div class="col-md-7">
                                    <input id="item_name" type="text" class="form-control" name="item_name"
                                           value="{{old('item_name')}}" required>
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    <label for="specification" class="col-md-4 text-normal">specification</label>
                                    <div class="col-md-7">
                                    <textarea style="height: 125px" class="form-control" id="specification" name="specification"> </textarea>
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    <label for="status" class="col-md-4 text-normal">status</label>
                                    <div class="col-md-7">
                                    <input id="status" type="text" class="form-control" name="status"
                                           value="{{old('status')}}" required>
                                    </div>
                                </div>    

                                
                            </div>
                        </div>
                        <div class="col-md-4">
                           
                            <div class="bgc-white p-20 bd">
                                <h5>Additional Information </h5>
                                <div class="form-group">
                                    <label for="location" class="text-normal ">location</label>
                                        <select autofocus id="location" name="location" data-dependentfields="" class="selectize input-sm form-control">
                                            @foreach ($locations as $location)
                                            <option value="{{$location->id}}">{{$location->location_name}}</option>
                                            @endforeach
                                        </select>
                                    
                                </div> 

                                <div class="form-group">
                                    <label for="source" class="text-normal ">source</label>
                                        <select autofocus id="source" name="source" data-dependentfields="" class=" selectize input-sm form-control">
                                            @foreach ($sources as $source)
                                            <option value="{{$source->id}}">{{$source->source_name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="date_enter" class="text-normal">date_enter</label>
                                    <input id="date_enter" type="text" class="form-control" name="date_enter" value="{{old('date_enter')}}"   >
                                </div>
                                <div class="form-group">
                                    <label for="condition" class="text-normal ">Condition</label>
                                        <select autofocus id="condition" name="condition" data-dependentfields="" class=" selectize input-sm form-control">
                                            <option value="baik">Baik</option>
                                            <option value="sedang">Sedang</option>
                                            <option value="rusak ringan">Rusak Ringan</option>
                                            <option value="rusak berat">Rusak Berat</option>
                                        </select>
                                </div>
                                <div class="form-group " >
                                    <label for="value">Value</label>
                                        <div class="input-group ">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                              </div>
                                              <input type="text" class="form-control" id="value" name="value" value="{{old('value')}}">
                                              <div class="input-group-append">
                                                <span class="input-group-text">,-</span>
                                              </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
<script type="text/javascript">
$('.selectize').selectize({
    sortField: 'text'
});

$( "#date_enter" ).datepicker({
  changeMonth: true,
  changeYear: true,
  autoSize: true,
  dateFormat: "yy-mm-dd"
});


$('#submit-a').on('click', function(e) { 
    e.preventDefault();
    $('#form-profile').submit(); 
});

</script>
@endsection