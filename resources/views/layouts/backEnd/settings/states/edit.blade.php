@extends('layouts.backEnd.cpanel')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <h3 class="content-header-title">{{$title}}</h3>
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{aurl('dashboard')}}">{{ trans('admin.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{route('states.index')}}">{{ trans('admin.states') }}</a></li>
            <li class="breadcrumb-item active">{{$title}}
            </li>
          </ol>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-content collapse show">
          <div class="card-body">
            <form class="form form-horizontal" method="POST" action="{{route('states.update',$state->id)}}">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <h4 class="form-section"> {{ $title }}</h4>
                    @include('layouts.backEnd.includes._msg')
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-md-3 label-control">{{ trans('admin.ar_state_name') }}</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control " value="{{$state->ar_state_name}}" placeholder="{{ trans('admin.ar_state_name') }}"
                              name="ar_state_name" ">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-md-3 label-control">{{ trans('admin.en_state_name') }}</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control " value="{{$state->en_state_name}}" placeholder="{{ trans('admin.en_state_name') }}"
                              name="en_state_name" ">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-md-3 label-control">{{ trans('admin.country') }}</label>
                          <div class="col-md-9">
                            <select name="country_id" id="country_id" class="form-control">
                            </select>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-md-3 label-control">{{ trans('admin.city') }}</label>
                          <div class="col-md-9">
                            <select name="city_id" id="city_id" class="form-control">
                            </select>
                          </div>
                        </div>
                    </div>

                </div>
                <div class="form-actions left">
                    <button type="submit" class="btn btn-success">
                        <i class="la la-check-square-o"></i> {{ trans('admin.save') }}
                      </button>
                    <button type="button" class="btn btn-warning mr-1" onclick="location.href='{{route('states.index')}}';">
                    <i class="ft-x"></i> {{ trans('admin.cancel') }}
                  </button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
<script>
	    (function getCountrySelected()
	    {
			 var country_id = "{{ $state->country_id }}";
	        $.ajax({
				type:'POST',
				url:'{{route("country.selected")}}',
				data: {
					_method     : 'PUT',
					country_id    : country_id,
					_token      : '{{ csrf_token() }}'
				},
	          dataType:'json',
	          success:function(data){
				$('#country_id').html(data);
	          }
	        });
		}());
        (function getCitySelected()
	    {
			 var city_id = "{{ $state->city_id }}";
	        $.ajax({
				type:'POST',
				url:'{{route("city.selected")}}',
				data: {
					_method     : 'PUT',
					city_id    : city_id,
					_token      : '{{ csrf_token() }}'
				},
	          dataType:'json',
	          success:function(data){
				$('#city_id').html(data);
	          }
	        });
		}());
</script>
@endsection
