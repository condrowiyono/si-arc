@extends('layout.layout')

@section('title', 'Ubah Profile')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Edit Profile
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
                <form id="form-profile" class="form-horizontal" role="form" method="POST" action="{{ route('profile.update', $user->name) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="bgc-white p-20 bd">
                                <h5>Data </h5>
                                <div class="form-group row">
                                    <label for="name " class="col-md-4 text-normal">Nama</label>
                                    <div class="col-md-7">
                                    <input id="display_name" type="text" class="form-control" name="name"
                                           value="{{$user->name}}" disabled required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="text-normal col-md-4">E-Mail</label>
                                    <div class="col-md-7">
                                    <input id="email" type="text" class="form-control" name="email"
                                           value="{{$user->email}}" disabled required >
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="fullname" class="text-normal col-md-4">Full Name</label>
                                    <div class="col-md-7">
                                    <input id="fullname" type="text" class="form-control" name="fullname" value="{{$user->fullname}}" required autofocus >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="born_date" class="text-normal col-md-4">Born Date</label>
                                    <div class="col-md-7">
                                    <input id="born_date" type="text" class="form-control" name="born_date" value="{{$user->born_date}}"   >
                                    </div>
                                </div>
                                <h5>ITB </h5>
                                <div class="form-group row">
                                    <label for="major" class="text-normal col-md-4">major</label>
                                    <div class="col-md-7">
                                        <select id="major" name="major" data-dependentfields="" class="input-sm form-control">
                                            <option value=""></option>
                                            @foreach ($major as $major) 
                                            <option {{$user->major==$major->code ? 'selected' :'' }} value="{{$major->code}}">{{$major->code}} - {{$major->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="batch" class="text-normal col-md-4">batch</label>
                                    <div class="col-md-7">
                                    <input id="batch" type="text" class="form-control" name="batch" value="{{$user->batch}}"   >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nim" class="text-normal col-md-4">nim</label>
                                    <div class="col-md-7">
                                    <input id="nim" type="text" class="form-control" name="nim" value="{{$user->nim}}"   >
                                    </div>
                                </div>
                                <h5>Division in ARC 
                                <a href="#" class="btn btn-default btn-sm divison_add"><span class="fa fa-plus"></span></a>
                                </h5>

                                <div class="form-group row" >
                                    <label for="" class="col-md-4">Division</label>
                                    @foreach ($user->divisions as $div)
                                    <div class="col-md-7" id="division_input">
                                        <div class="input-group mB-10 ">
                                            <select id="division" name="division_div[]" data-dependentfields="" class="input-sm form-control">
                                                <option value=""></option>
                                                @foreach ($division as $division) 
                                                <option {{$div->division==$division->division ? 'selected' : ''}} value="{{$division->division}}">{{$division->division}}</option>
                                                @endforeach
                                            </select>
                                            <input type="text" value="{{$div->pivot->year}}" class="form-control col-md-7 col-md-7" name="division_year[]" placeholder="Tahun">
                                            <div class="input-group-append">
                                              <a  href="javascript:void(0);" class="division_minus btn btn-default" > <span class="fa fa-minus"></span> </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bgc-white p-20 bd">
                                <h5>Contact </h5>
                                <div class="form-group">
                                    <label for="phone" class="text-normal">Phone(s)</label>
                                    <input type="text" name="phones" id="phones" value="{{$user->phones->implode('phone', ',')}}">
                                </div>
                                <div class="form-group">
                                    <label for="add_email" class="text-normal">Additional Email</label>
                                    <input type="text" name="add_emails" id="add_emails" value="{{$user->emails->implode('email', ',')}}">
                                </div>
                                <div class="form-group">
                                    <label for="address" class="text-normal">Address</label>
                                    <input type="text" name="addresses" id="addresses" value="{{$user->addresses->implode('address', ',')}}">
                                </div>
                                <div class="form-group" id="social_input">
                                    <label for="inpuFname">Social
                                    <a href="" class="btn btn-default btn-sm social_add"><span class="fa fa-plus"></span></a>
                                    </label>
                                    @foreach ($user->socials as $so)
                                        <div class="input-group mB-10">
                                            <div class="input-group-prepend bs-dropdown-to-select-group">
                                                <button type="button" class="btn btn-default dropdown-toggle as-is bs-dropdown-to-select" data-toggle="dropdown" tabindex="-1">
                                                    <span data-bind="bs-drp-sel-label">
                                                        <span class="fa fa-{{$so->type}}"></span>
                                                    </span>
                                                    <input type="hidden" name="social_type[]" data-bind="bs-drp-sel-value" value="{{$so->type}}">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu" style=" max-height: 300px; overflow: scroll; overflow-y: scroll; overflow-x: hidden; ">
                                                    <li data-value="facebook"><a href="#">
                                                        <span class="fa fa-facebook-square"></span> Facebook
                                                    </a></li>
                                                    <li data-value="twitter"><a href="#">
                                                        <span class="fa fa-twitter-square"></span> Twitter
                                                    </a></li>
                                                    <li data-value="github"><a href="#">
                                                        <span class="fa fa-github-square"></span> Github
                                                    </a></li>
                                                    <li data-value="linkedin"><a href="#">
                                                        <span class="fa fa-linkedin-square"></span> LinkedIn
                                                    </a></li>
                                                </ul>
                                            </div>
                                            <input type="text" value="{{$so->account}}" class="form-control col-md-7 col-md-7" name="social_account[]" placeholder="Account Name">
                                            <div class="input-group-append">
                                              <a  href="javascript:void(0);" class="social_minus btn btn-default" > <span class="fa fa-minus"></span> </a>
                                            </div>
                                        </div>
                                    @endforeach
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

$('.divison_add').on('click', function(e) { 
    e.preventDefault();
    var division_form = `
            <div class="input-group mB-10 ">
                <select id="division" name="division_div[]" data-dependentfields="" class="input-sm form-control">
                    {!! $listDivision !!}
                </select>
                <input type="text" value="" class="form-control col-md-7 col-md-7" name="division_year[]" placeholder="Tahun">
                <div class="input-group-append">
                  <a  href="javascript:void(0);" class="division_minus btn btn-default" > <span class="fa fa-minus"></span> </a>
                </div>
            </div>
    `;   
    $('#division_input').append(division_form);   
    $('.division_minus').on('click', function(e) { 
        e.preventDefault();
        $(this).parent().parent().remove();
    });  
});


$('.division_minus').on('click', function(e) { 
    e.preventDefault();
    $(this).parent().parent().remove();
});

function append() {
    var social_form = `
        <div class="input-group mB-10">
            <div class="input-group-prepend bs-dropdown-to-select-group">
                <button type="button" class="btn btn-default dropdown-toggle as-is bs-dropdown-to-select" data-toggle="dropdown" tabindex="-1">
                    <span data-bind="bs-drp-sel-label">
                        <span class="fa fa-facebook"></span>
                    </span>
                    <input type="hidden" name="social_type[]" data-bind="bs-drp-sel-value" value="facebook">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu" style=" max-height: 300px; overflow: scroll; overflow-y: scroll; overflow-x: hidden; ">
                    <li data-value="facebook"><a href="#">
                        <span class="fa fa-facebook-square"></span> Facebook
                    </a></li>
                    <li data-value="twitter"><a href="#">
                        <span class="fa fa-twitter-square"></span> Twitter
                    </a></li>
                    <li data-value="github"><a href="#">
                        <span class="fa fa-github-square"></span> Github
                    </a></li>
                    <li data-value="linkedin"><a href="#">
                        <span class="fa fa-linkedin-square"></span> LinkedIn
                    </a></li>
                </ul>
            </div>
            <input type="text" value="" class="form-control col-md-7 col-md-7" name="social_account[]" placeholder="Account Name">
            <div class="input-group-append">
              <a  href="javascript:void(0);" class="social_minus btn btn-default" > <span class="fa fa-minus"></span> </a>
            </div>
        </div>
    `;
    $('#social_input').append(social_form); 
    $('.social_minus').on('click', function(e) { 
        e.preventDefault();
        $(this).parent().parent().remove();
    }); 
}

$('.social_add').on('click', function(e) { 
    e.preventDefault();
    append();       
});


$('.social_minus').on('click', function(e) { 
    e.preventDefault();
    $(this).parent().parent().remove();
});

$( document ).on( 'click', '.bs-dropdown-to-select-group .dropdown-menu li', function( event ) {
    var $target = $( event.currentTarget );
    $target.closest('.bs-dropdown-to-select-group')
        .find('[data-bind="bs-drp-sel-value"]').val($target.attr('data-value'))
        .end()
        .children('.dropdown-toggle').dropdown('toggle');

    $target.closest('.bs-dropdown-to-select-group')
        .find('[data-bind="bs-drp-sel-label"]').html('<span class=" fa fa-' + $target.attr('data-value') + '"></span>');/*$target.text()*/ 
    return false;
});

$('#major').selectize({
    sortField: 'text'
});


$( "#born_date" ).datepicker({
  changeMonth: true,
  changeYear: true,
  autoSize: true,
  dateFormat: "yy-mm-dd"
});

$('#phones').selectize({
    delimiter: ',',
    persist: false,
    valueField: 'phone',
    labelField: 'phone',
    searchField: 'phone',
    create: function(input) {
        return {
            phone: input
        }
    }
});

$('#addresses').selectize({
    delimiter: ',',
    persist: false,
    valueField: 'address',
    labelField: 'address',
    searchField: 'address',
    create: function(input) {
        return {
            address: input
        }
    }
});


var REGEX_EMAIL = '([a-z0-9!#$%&\'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+/=?^_`{|}~-]+)*@' +
                  '(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)';

$('#add_emails').selectize({
    delimiter: ',',
    persist: false,
    maxItems: null,
    valueField: 'add_email',
    labelField: 'add_email',
    searchField: 'add_email',
    createFilter: function(input) {
        var match, regex;

        // email@address.com
        regex = new RegExp('^' + REGEX_EMAIL + '$', 'i');
        match = input.match(regex);
        if (match) return !this.options.hasOwnProperty(match[0]);

        // name <email@address.com>
        regex = new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i');
        match = input.match(regex);
        if (match) return !this.options.hasOwnProperty(match[2]);

        return false;
    },
    create: function(input) {
        if ((new RegExp('^' + REGEX_EMAIL + '$', 'i')).test(input)) {
            return {add_email: input};
        }
        var match = input.match(new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i'));
        if (match) {
            return {
                add_email : match[2],
            };
        }
        alert('Invalid email address.');
        return false;
    }
});

$('#submit-a').on('click', function(e) { 
    e.preventDefault();
    $('#form-profile').submit(); 
});

</script>
@endsection