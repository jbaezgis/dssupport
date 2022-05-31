@extends('layouts.app', ['menu' => 'groundtransfer', 'hidesidebar' => true, 'title' => "Ground Transfer Request from $service->from_name"])

@section('head')
	{{-- <link rel="stylesheet" href="{{URL::asset('/btdatepicker/css/bootstrap-datepicker.min.css')}}"> --}}
	<!-- Bootstrap time Picker -->
	{{-- <link rel="stylesheet" href="{{URL::asset('plugins/timepicker/bootstrap-timepicker.css')}}"> --}}
	<link rel="stylesheet" href="{{URL::asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

@endsection

@section('content')
{{-- <h1 class="title">Transfers & Shuttle Service(all our Transfers and Shuttles are Private)</h1> --}}
{{-- <div class="row">
	<div class="col-md-12">
		<a href="/services" class="btn btn-primary">{{ __('Go back to Services') }} </a>
	</div>
</div>
<hr> --}}

{!! Form::open(['class' => '', 'route' => 'transfer_submit'] ) !!}
{!! Form::hidden('service_id', $service->id) !!}
{!! Form::hidden('service_type', $service_type) !!}
{!! Form::hidden('type', $way) !!}
{!! Form::hidden('alias_location_from', $service->from_name) !!}
{!! Form::hidden('alias_location_to', $service->to_name) !!}
{!! Form::hidden('driving_time', $service->driving_time) !!}
{!! Form::hidden('from_airport', $service->fromlocation->is_airport) !!}
{!! Form::hidden('to_airport', $service->tolocation->is_airport) !!}

<!-- Map Modal -->
<div class="modal fade" id="map" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">{{ __('Map') }}</h4>
		</div>
		<div class="modal-body">
			
			<iframe
				width="100%"
				height="450"
				frameborder="0" style="border:0"
				src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDGkozgjrmFAlSKsmNBkIu_iOeOKAEN9_g&origin={{$service->from_name.', Dominican Republic'}}&destination={{$service->to_name}}.', Dominican Republic'}}" allowfullscreen>
			</iframe>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		{{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
		</div>
	</div>
	</div>
</div>
		<div class="row">
			<div class="col-md-12">
				<img src="{{ asset('img/BannerSup-PorSubasta-02.png') }}" class="img-responsive" alt="Cinque Terre">
			</div>
		</div>
<div class="container">
	{{-- <div class="row" style="background-color: #00a680;">
			<div class="col-md-2">
				<img src="{{ asset('images/tripadvisor.png') }}" class="img-responsive" alt="Cinque Terre">
			</div>
			<div class="col-md-3 text-center">
				<h3 class="text-white">Best Transfers <br> In the DR!</h3>
			</div>
			<div class="col-md-4 text-center">
				<h3 class="">Private Shuttle Transfer Service</h3>
			</div>
			<div class="col-md-3 text-center">
				<h3 class="text-white">20 Years Trusted<br> Tourist Service!</h3>
			</div>
	</div> --}}
</div>

<div class="row text-center">
	<div class="col-md-12">

		<h3><span style="color: red">{{ __('From')}}:</span> <span class="text-primary">{{$service->from_name}}</span> <span style="color: red">{{ __('To')}}:</span> <span class="text-primary">{{$service->to_name}}</span> </h3>
		
		{{-- <div class="row text-center">
			<div class="col-md-12">
				<div class="btn-group" role="group" aria-label="...">
					<a class="btn {{ $way == 'oneway' ? 'btn-primary' : 'btn-default'}} btn-lg" href="{{url('request-ground-transfer-service?service='.$service->id.'&way=oneway&aFrom=0'.'&aTo=0')}}">One Way ${{$service->prices->first()->oneway_price}}</a>
					<a class="btn {{ $way == 'roundtrip' ? 'btn-primary' : 'btn-default'}} btn-lg" href="{{url('request-ground-transfer-service?service='.$service->id.'&way=roundtrip&aFrom=0'.'&aTo=0')}}">Round Trip ${{$service->prices->first()->roundtrip_price}}</a>
				</div>
			</div>
		</div> --}}

		{{-- <p>After submission of this request you can decide upon paying either a down payment via Credit Card or PayPal and the due amount in cash to the driver or pay the total amount online via Credit Card or PayPal.</p>

		<p>Give us please as much information as possible about your upcoming trip (cell. phone number where we can reach you - if available, Hotel or Place you will stay before you start your trip with us, Airline, Flight Number and scheduled arrival and/or departure times). </p>

		<p><strong>Cancellation Policy</strong> - 48 hour(s) before scheduled Pick up Time 100 % refund, 24 - 48 hour(s) before scheduled Pick up Time time 50 % refund, 24 hour(s) or less before scheduled Pick up Time or "No Show" - NO REFUND.</p> --}}
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12 text-center">
		<a class="btn  {{ $way == 'oneway' ? 'btn-primary btn-lg' : 'btn-default'}}" href="{{url('request-ground-transfer-service?service='.$service->id.'&way=oneway&aFrom=0'.'&aTo=0')}}">One Way</span></a>
		<a class="btn {{ $way == 'roundtrip' ? 'btn-primary btn-lg' : 'btn-default'}}" href="{{url('request-ground-transfer-service?service='.$service->id.'&way=roundtrip&aFrom=0'.'&aTo=0')}}">Round Trip</span></a>
		{{-- <div class="btn-group" role="group" aria-label="...">
		</div> --}}
	</div>
</div>
<br>
<div class="row mt-2">
	<div class="col-md-12">
		<div class="box box-solid">
			{{-- <div class="box-header with-border">
				<h3 class="box-title">{{ __('Booking options') }}</h3>
			</div> --}}
			<!-- /.box-header -->
			<div class="box-body ">
				<div class="row">
					<div class="col-md-1 text-center">
						<a class="btn btn-default" data-toggle="modal" data-target="#map">
							<i class="fa fa-map-marker" aria-hidden="true"></i> {{ __('See map')}}
						</a>
					</div>
					<br class="hidden-md hidden-lg">
					<div class="col-md-3">
						<div class="form-group">
							{{-- <label class="control-label">{{ __('Vehicle Size') }}</label> --}}
							
							<select name="service_price_id" id="CH_product_variation" class="form-control ">
								{{-- <option value=""><span class="text-muted">Select how many passengers</span></option> --}}
							@foreach ($service->prices as $price)
								@if ($way == 'oneway')
									<option value="{{$price->id}}" data-price="{{$price->oneway_price}}" data-maxpassengers="{{$price->priceOption()->first()->maxpassengers}}" @if (old('service_price_id') == $price->id) {{ 'selected' }} @endif>{{$price->priceOption()->first()->name}} - {{$price->oneway_price}}</option>
								@else
									<option value="{{$price->id}}" data-price="{{$price->roundtrip_price}}" data-maxpassengers="{{$price->priceOption()->first()->maxpassengers}}" @if (old('service_price_id') == $price->id) {{ 'selected' }} @endif>{{$price->priceOption()->first()->name}} - {{$price->roundtrip_price}}</option>
								@endif
							@endforeach
							</select>
							@if ($errors->has('service_price_id'))<p class="input-error">{!!$errors->first('service_price_id')!!}</p>@endif
							<strong><i>{{ __('For large groups call (829) 820-5200') }}</i></strong>
						</div>
						
					</div>

					{{-- <div class="col-md-1">
						<div class="form-group">
							{!! Form::label('passengers', 'Passengers', ['class' => '']) !!}
							<select name="passengers" id="passengers" class="form-control">
								
							</select>
						</div>
						
					</div> --}}
					<div class="col-md-2">
						<div class="form-group">
							{{-- {!! Form::label('childseats', 'Childseat(s)', ['class' => '']) !!}  --}}
							{!! Form::select('childseats_upto12month', ['0' => 'Under 1 year', 1 => '1 seat', 2 => '2 seats', 3 => '3 seats'], null, ['class' => 'form-control CH_childseat ']) !!} 
						</span>Baby Seats (under 1 year)</span>
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">
							{{-- {!! Form::label('', '', ['class' => '']) !!} --}}
							{!! Form::select('childseats_over1year', ['0' => 'Over 1 year old', 1 => '1 seat', 2 => '2 seats', 3 => '3 seats'], null, ['class' => 'form-control CH_childseat']) !!} 
						</span>Child Seats (over 1 year)</span>
						</div>
					</div>
					
					{{-- <div class="col-md-3">
						<div class="btn-group" role="group" aria-label="...">
							<a class="btn {{ $way == 'oneway' ? 'btn-primary' : 'btn-default'}}" href="{{url('request-ground-transfer-service?service='.$service->id.'&way=oneway&aFrom=0'.'&aTo=0')}}">One Way $<span id="{{ $way=='oneway' ? 'sp_price' : '' }}">{{$service->prices->first()->oneway_price}}</span></a>
							<a class="btn {{ $way == 'roundtrip' ? 'btn-primary' : 'btn-default'}}" href="{{url('request-ground-transfer-service?service='.$service->id.'&way=roundtrip&aFrom=0'.'&aTo=0')}}">Round Trip $<span id="{{ $way=='roundtrip' ? 'sp_price' : '' }}">{{$service->prices->first()->roundtrip_price}}</span></a>
						</div>
					</span>Includes Taxes, Fees and Baby Seat</span>
					</div> --}}
					<div class="col-md-4">
						<h4 class="text-primary">
							Total:
							<span class="price_amount">$
							<span id="sp_price">
							@if($way=='oneway') 
								{{$service->prices->first()->oneway_price}} 
							@else 
								{{$service->prices->first()->roundtrip_price }}
							@endif
							{{-- 0.00 --}}
							</span></span>
						</h4>
							</span>Includes Taxes, Fees and Baby Seat</span> 

					</div>

				</div>
			</div>
			<!-- /.box-body -->
			{{-- <div class="box-footer">
				<div class="row">
				</div>
			</div> --}}
		</div>
	</div>
</div>
{{-- <hr> --}}

{{-- <div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="to">From Hotel</label>
							@if ($service->fromlocation->is_airport)
								<input class="form-control" id="disabledInput" type="text" placeholder="Main location is an airport" disabled>
							@else
								{!! Form::select('from_place', App\Place::where('location_id', $service->from)->orderBy('name')->pluck('name', 'id'), null, ['id'=>'from_place', 'placeholder'=>'--Sub location--', 'class'=>'form-control select2', 'required'  ]) !!}
								<small id="toErrors" class="form-text text-danger">{{ $errors->first('from_place') }}</small>
							@endif
						</div>
					</div>
	
					<div class="col-md-6">
						<div class="form-group">
							<label for="to">To Hotel</label>
							@if ($service->tolocation->is_airport)
								<input class="form-control" id="disabledInput" type="text" placeholder="Main location is an airport" disabled>
							@else
								{!! Form::select('to_place', App\Place::where('location_id', $service->to)->orderBy('name')->pluck('name', 'id'), null, ['id'=>'to_place', 'placeholder'=>'--Sub location--', 'class'=>'form-control select2', 'required'  ]) !!}
								<small id="toErrors" class="form-text text-danger">{{ $errors->first('to_place') }}</small>
							@endif
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div> --}}

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			{{-- <div class="box-header with-border">
				<h3 class="box-title">Contact Information</h3>
			</div> --}}
			{{-- end box-header --}}
			<div class="box-body">
					{{-- @if ($errors->any())
					<ul class="alert alert-danger">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				@endif
				<p></p> --}}
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }}">
							<label class="control-label">First and Last name</label>
							{!! Form::text('fullname', null, ['class' => 'form-control']) !!} 
							@if ($errors->has('fullname')) <span class="help-block">{!!$errors->first('fullname')!!}</span>@endif
						</div>
					</div>
					{{-- end col --}}

					<div class="col-md-6">
						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							<label class="control-label">Email</label>
							{!! Form::email('email', null, ['class' => 'form-control']) !!} 
							@if ($errors->has('email')) <span class="help-block">{!!$errors->first('email')!!}</span>@endif
							
						</div>
					</div>
					{{-- end col --}}
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
							<label class="control-label">Cell Phone</label>
							{!! Form::text('phone', null, ['class' => 'form-control']) !!} 
							@if ($errors->has('phone')) <span class="help-block">{!!$errors->first('phone')!!}</span>@endif
						</div>
					</div>
					{{-- end col --}}
					 <div class="col-md-6">
						<div class="form-group">
							<label class="control-label">{{ __('Preferred language')}}</label>
							<select class="form-control " name="language" id="language">
								<option value="en"  {{ old('language') == 'en' ? 'selected' : '' }}>English</option>
								<option value="es" {{ old('language') == 'es' ? 'selected' : '' }}>Español</option>
							</select> 
						</div>
					</div>
					
					{{--<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Nationality</label>
							{!! Form::text('nationality', null, ['class' => 'form-control']) !!} 
							<small>We require nationality to assure our service team speaks your language. Our team covers Spanish, English, German, Italian, Russian, French, Dutch, Portuguese.</small>
						</div>
					</div> --}}
					{{-- end col --}}
				</div>
				{{-- end row --}}
				
				@if ($service->fromlocation->is_airport and $service->tolocation->is_airport)
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="arriva_date" class="control-label">{{$way == 'roundtrip' ? __('1st Trip arrival date') : 'Arrival date'}} </label>
									{{-- {!! Form::label('arrival_date', __('Arrival Date'), ['class' => 'control-label']) !!} --}}
									{!! Form::text('arrival_date', null, ['class' => 'form-control arrival_date', ]) !!}
									@if ($errors->has('arrival_date')) <p class="input-error">{{$errors->first('arrival_date')}}</p> @endif
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="arrival_airline" class="control-label">{{$way == 'roundtrip' ? __('1st Trip arrival airline') : 'Arrival airline'}} </label>
									{{-- {!! Form::label('arrival_airline', $service->fromlocation->is_airport ? 'Arrival Airline' : 'Departure Airline', ['class' => 'control-label']) !!} --}}
									{!! Form::text('arrival_airline', null, ['class' => 'form-control']) !!}
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="form-group">
									{!! Form::label('flight_number', 'Flight Number', ['class' => 'control-label']) !!}
									{!! Form::text('flight_number', null, ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label for="arrival_time" class="control-label">{{$way == 'roundtrip' ? __('1st Trip arrival time') : 'Arrival time'}} </label>
									{{-- {!! Form::label('arrival_time', __('Arrival Time'), ['class' => 'control-label']) !!} --}}
									<input type="text" class="form-control timepicker {{ $errors->has('arrival_time') ? 'is-invalid' : '' }}" id="arrival_time" name="arrival_time" value="{{old('arrival_time')}}">
								</div>
							</div>
							{{-- <div class="col-md-3">
								<div class="form-group">
									{!! Form::label('want_to_arrive', 'I would like to be at the airport', ['class' => 'control-label']) !!}
									
									<select class="form-control" name="want_to_arrive" id="want_to_arrive">
										@foreach($willArriveData as $k => $v)
										<option value="{{$k}}" {{old('want_to_arrive') == '' && $k=='120' ? 'selected' : ''}} {{old('want_to_arrive') == $k ? 'selected' : ''}}>{{$v}}</option>
										@endforeach
									</select>
	
								</div>
								</span>before the flight departure time</span> 
							</div> --}}
							<div class="col-md-12">
								<div class="form-group">
									{{-- {!! Form::label('more_information', __('Addtional information'), ['class' => 'control-label']) !!} --}}
									{!! Form::label('more_information', __('Please enter your departing flight information (airline, flight number and departure time), as well as any additional information we should know.'), ['class' => 'control-label']) !!}
									{!! Form::textarea('more_information', null, ['rows' => 2, 'class' => 'form-control']) !!}
									@if ($errors->has('more_information')) <p class="input-error">{{$errors->first('more_information')}}</p> @endif
								</div>
							</div>
							
						</div>
				@elseif ($service->fromlocation->is_airport)
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								{!! Form::label('arrival_date', __('Arrival Date'), ['class' => 'control-label']) !!}
								{!! Form::text('arrival_date', null, ['class' => 'form-control arrival_date', ]) !!}
								@if ($errors->has('arrival_date')) <p class="input-error">{{$errors->first('arrival_date')}}</p> @endif
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!! Form::label('arrival_airline', $service->fromlocation->is_airport ? 'Arrival Airline' : 'Departure Airline', ['class' => 'control-label']) !!}
								{!! Form::text('arrival_airline', null, ['class' => 'form-control']) !!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!! Form::label('flight_number', 'Flight Number', ['class' => 'control-label']) !!}
								{!! Form::text('flight_number', null, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								{!! Form::label('arrival_time', __('Arrival Time'), ['class' => 'control-label']) !!}
								<input type="text" class="form-control timepicker {{ $errors->has('arrival_time') ? 'is-invalid' : '' }}" id="arrival_time" name="arrival_time" value="{{old('arrival_time')}}">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								{{-- {!! Form::label('more_information', __('Enter pick-up and/or drop-off Hotel or Address, and other information'), ['class' => 'control-label']) !!} --}}
								{!! Form::label('more_information', __('Please enter the name of your hotel or the address of your drop off location, as well as any additional information we should know.'), ['class' => 'control-label']) !!}
								{!! Form::textarea('more_information', null, ['rows' => 2, 'class' => 'form-control']) !!}
								@if ($errors->has('more_information')) <p class="input-error">{{$errors->first('more_information')}}</p> @endif
							</div>
						</div>
						
					</div>
		
				{{-- End if formlocation is airport --}}
		
				{{-- Start if tolocation is airport --}}
				@elseif ($service->tolocation->is_airport)
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								{!! Form::label('arrival_date', __('Departure Date'), ['class' => 'control-label']) !!}
								{!! Form::text('arrival_date', null, ['class' => 'form-control arrival_date', ]) !!}
								@if ($errors->has('arrival_date')) <p class="input-error">{{$errors->first('arrival_date')}}</p> @endif
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!! Form::label('arrival_airline', __('Departure Airline'), ['class' => 'control-label']) !!}
								{!! Form::text('arrival_airline', null, ['class' => 'form-control']) !!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!! Form::label('flight_number', 'Flight Number', ['class' => 'control-label']) !!}
								{!! Form::text('flight_number', null, ['class' => 'form-control']) !!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!! Form::label('arrival_time', __('Departure Time'), ['class' => 'control-label']) !!}
								<input type="text" class="form-control timepicker {{ $errors->has('arrival_time') ? 'is-invalid' : '' }}" id="arrival_time" name="arrival_time" value="{{old('arrival_time')}}">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!! Form::label('want_to_arrive', 'I would like to be at the airport', ['class' => 'control-label']) !!}
								
								<select class="form-control" name="want_to_arrive" id="want_to_arrive">
									@foreach($willArriveData as $k => $v)
									<option value="{{$k}}" {{old('want_to_arrive') == '' && $k=='120' ? 'selected' : ''}} {{old('want_to_arrive') == $k ? 'selected' : ''}}>{{$v}}</option>
									@endforeach
								</select>

								<strong>before the flight departure time</strong> 
						</div>
						</div>
						<br>
						
						<div class="col-md-12">
							<div class="form-group">
								{{-- {!! Form::label('more_information', __('Enter pick-up and/or drop-off Hotel or Address, and other information'), ['class' => 'control-label']) !!} --}}
								{!! Form::label('more_information', __('Please enter the name of your hotel or the address of your pick-up location, as well as any additional information we should know.'), ['class' => 'control-label']) !!}
								{!! Form::textarea('more_information', null, ['rows' => 2, 'class' => 'form-control']) !!}
								@if ($errors->has('more_information')) <p class="input-error">{{$errors->first('more_information')}}</p> @endif
							</div>
						</div>
						
					</div>
				{{-- End if tolocation is airport --}}
				@else
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="arriva_date" class="control-label">{{$way == 'roundtrip' ? __('1st') : ''}} {{ __('Trip out pick-up date') }} </label>
								{{-- {!! Form::label('arrival_date', __('Trip out pick-up date'), ['class' => 'control-label']) !!} --}}
								{!! Form::text('arrival_date', null, ['class' => 'form-control arrival_date', ]) !!}
								@if ($errors->has('arrival_date')) <p class="input-error">{{$errors->first('arrival_date')}}</p> @endif
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="arriva_date" class="control-label">{{$way == 'roundtrip' ? __('1st') : ''}} {{ __('Trip out pick-up time') }} </label>
								{{-- {!! Form::label('arrival_time', __('Trip out pick-up time'), ['class' => 'control-label']) !!} --}}
								<input type="text" class="form-control timepicker {{ $errors->has('arrival_time') ? 'is-invalid' : '' }}" id="arrival_time" name="arrival_time" value="{{old('arrival_time')}}">
							</div>
						</div>
		
						<div class="col-md-12">
							<div class="form-group">
								{{-- {!! Form::label('more_information', __('Enter pick-up and/or drop-off Hotel or Address, and other information'), ['class' => 'control-label']) !!} --}}
								{!! Form::label('more_information', __('Please enter the name of your pick-up hotel or address AND the name of your drop-off hotel or location, as well as any additional information we should know.'), ['class' => 'control-label']) !!}
								{!! Form::textarea('more_information', null, ['rows' => 2, 'class' => 'form-control']) !!}
								@if ($errors->has('more_information')) <p class="input-error">{{$errors->first('more_information')}}</p> @endif
							</div>
						</div>
						
					</div>
				@endif
				{{-- start roundtrip information --}}
				@if ($way == 'roundtrip')
					@if ($service->fromlocation->is_airport and $service->tolocation->is_airport)
							<div class="row"> 
								<div class="col-md-3">
									<div class="form-group">
										{!! Form::label('return_date', __('2nd Trip arrival date'), ['class' => 'control-label']) !!}
										{!! Form::text('return_date', null, ['class' => 'form-control return_date']) !!}
										@if ($errors->has('return_date')) <p class="input-error">{{$errors->first('return_date')}}</p> @endif
										
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										{!! Form::label('return_airline', __('2nd Trip arrival airline'), ['class' => 'control-label']) !!}
										{!! Form::text('return_airline', null, ['class' => 'form-control']) !!}
									</div>
								</div>
		
								<div class="col-md-3">
									<div class="form-group">
										{!! Form::label('return_flight_number', 'Flight Number', ['class' => 'control-label']) !!}
										{!! Form::text('return_flight_number', null, ['class' => 'form-control']) !!}
									</div>
								</div>
									
								<div class="col-md-3">
									<div class="form-group">
										{!! Form::label('return_time_2', __('2nd Trip arrival time'), ['class' => 'control-label']) !!}
										<input type="text" class="form-control timepicker {{ $errors->has('return_time_2') ? 'is-invalid' : '' }}" id="return_time_2" name="return_time_2" value="{{old('return_time_2')}}">
									</div>
								</div>
		
								<div class="col-md-12">
									<div class="form-group">
										{!! Form::label('return_more_information', __('Additional Information'), ['class' => 'control-label']) !!}
										{!! Form::textarea('return_more_information', null, ['rows' => 2, 'class' => 'form-control']) !!}
										@if ($errors->has('return_more_information')) <p class="input-error">{{$errors->first('return_more_information')}}</p> @endif
										
									</div>
								</div>
								
							
							</div>
					@elseif ($service->fromlocation->is_airport)
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										{!! Form::label('return_date', __('Departure Date'), ['class' => 'control-label']) !!}
										{!! Form::text('return_date', null, ['class' => 'form-control return_date']) !!}
										@if ($errors->has('return_date')) <p class="input-error">{{$errors->first('return_date')}}</p> @endif
										
									</div>
								</div>
		
								
								<div class="col-md-3">
									<div class="form-group">
										{!! Form::label('return_airline', __('Departure Airline'), ['class' => 'control-label']) !!}
										{!! Form::text('return_airline', null, ['class' => 'form-control']) !!}
									</div>
								</div>
		
								<div class="col-md-3">
									<div class="form-group">
										{!! Form::label('return_flight_number', 'Flight Number', ['class' => 'control-label']) !!}
										{!! Form::text('return_flight_number', null, ['class' => 'form-control']) !!}
									</div>
								</div>
									
								<div class="col-md-2">
									<div class="form-group">
										{!! Form::label('return_time_2', __('Departure Time'), ['class' => 'control-label']) !!}
										<input type="text" class="form-control timepicker {{ $errors->has('return_time_2') ? 'is-invalid' : '' }}" id="return_time_2" name="return_time_2" value="{{old('return_time_2')}}">
									</div>
								</div>
		
								
								<div class="col-md-3">
									<div class="form-group">
										{!! Form::label('return_want_to_arrive_2', 'I would like to be at the airport', ['class' => 'control-label']) !!}
										
										<select class="form-control" name="return_want_to_arrive_2" id="return_want_to_arrive_2">
											@foreach($willArriveData as $k => $v)
											<option value="{{$k}}" {{old('return_want_to_arrive_2') == '' && $k=='120' ? 'selected' : ''}} {{old('return_want_to_arrive_2') == $k ? 'selected' : ''}}>{{$v}}</option>
											@endforeach
										</select>
		
									<strong>before the flight departure time</strong> 
									</div>

								</div>
		
		
								{{-- <div class="col-md-2">
									<div class="form-group">
										{!! Form::label('return_pickup_time_2', 'Pickup Time', ['class' => 'control-label']) !!}
										<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="The indicated pick-up time is an estimate.  We monitor all flight arrival times.  Rest assured your driver will be waiting as specified in your confirmation email, no matter whether your flight arrival is delayed or early." alt=""></i>
		
										{!! Form::text('return_pickup_time_2', null, ['id' => 'return_pickup_time_2', 'readonly' => 'readonly', 'class' => 'form-control']) !!}
										
										
									</div>	
								</div> --}}
		
								<div class="col-md-12">
									<div class="form-group">
										{!! Form::label('return_more_information', __('Enter Hotel or Address and other additional Information if different from arrival drop-off information'), ['class' => 'control-label']) !!}
										{!! Form::textarea('return_more_information', null, ['rows' => 2, 'class' => 'form-control']) !!}
										@if ($errors->has('return_more_information')) <p class="input-error">{{$errors->first('return_more_information')}}</p> @endif
										
									</div>
								</div>
							
							</div>
					{{-- End if formlocation is airport --}}
		
					{{-- Start if tolocation is airport --}}
					@elseif ($service->tolocation->is_airport)
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											{!! Form::label('return_date', __('Arrival Date'), ['class' => 'control-label']) !!}
											{!! Form::text('return_date', null, ['class' => 'form-control return_date']) !!}
											@if ($errors->has('return_date')) <p class="input-error">{{$errors->first('return_date')}}</p> @endif
											
										</div>
									</div>
			
									
									<div class="col-md-3">
										<div class="form-group">
											{!! Form::label('return_airline', __('Arrival Airline'), ['class' => 'control-label']) !!}
											{!! Form::text('return_airline', null, ['class' => 'form-control']) !!}
										</div>
									</div>
			
									<div class="col-md-3">
										<div class="form-group">
											{!! Form::label('return_flight_number', 'Flight Number', ['class' => 'control-label']) !!}
											{!! Form::text('return_flight_number', null, ['class' => 'form-control']) !!}
										</div>
									</div>
										
									<div class="col-md-2">
										<div class="form-group">
											{!! Form::label('return_time_2', __('Arrival Time'), ['class' => 'control-label']) !!}
											<input type="text" class="form-control timepicker {{ $errors->has('return_time_2') ? 'is-invalid' : '' }}" id="return_time_2" name="return_time_2" value="{{old('return_time_2')}}">
										</div>
									</div>
			
									
									{{-- <div class="col-md-3">
										<div class="form-group">
											{!! Form::label('return_want_to_arrive_2', 'How early do you want to be at the airport?', ['class' => 'control-label']) !!}
											
											<select class="form-control" name="return_want_to_arrive_2" id="return_want_to_arrive_2">
												@foreach($willArriveData as $k => $v)
												<option value="{{$k}}" {{old('return_want_to_arrive_2') == '' && $k=='120' ? 'selected' : ''}} {{old('return_want_to_arrive_2') == $k ? 'selected' : ''}}>{{$v}}</option>
												@endforeach
											</select>
			
										</div>
									</div> --}}
			
			
									{{-- <div class="col-md-4">
										<div class="form-group">
											{!! Form::label('return_pickup_time_2', 'Pickup Time', ['class' => 'control-label']) !!}
											<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="The indicated pick-up time is an estimate.  We monitor all flight arrival times.  Rest assured your driver will be waiting as specified in your confirmation email, no matter whether your flight arrival is delayed or early." alt=""></i>
			
											{!! Form::text('return_pickup_time_2', null, ['id' => 'return_pickup_time_2', 'readonly' => 'readonly', 'class' => 'form-control']) !!}
											
											
										</div>	
									</div> --}}
			
									<div class="col-md-12">
										<div class="form-group">
											{!! Form::label('return_more_information', __('Enter Hotel or Address and other additional information if different from first trip pick-up information.'), ['class' => 'control-label']) !!}
											{!! Form::textarea('return_more_information', null, ['rows' => 2, 'class' => 'form-control']) !!}
											@if ($errors->has('return_more_information')) <p class="input-error">{{$errors->first('return_more_information')}}</p> @endif
											
										</div>
									</div>
								
								</div>
					{{-- End if tolocation is airport --}}
					@else
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									{!! Form::label('return_date', __('2nd Trip back pick-up date'), ['class' => 'control-label']) !!}
									{!! Form::text('return_date', null, ['class' => 'form-control return_date']) !!}
									@if ($errors->has('return_date')) <p class="input-error">{{$errors->first('return_date')}}</p> @endif
									
								</div>
							</div>
								
							{{-- <div class="col-md-3">
								<div class="form-group">
									{!! Form::label('return_time_2', __('2nd Trip back pick-up time'), ['class' => 'control-label']) !!}
									<input type="time" class="form-control timepicker {{ $errors->has('return_time_2') ? 'is-invalid' : '' }}" id="return_time_2" name="return_time_2" value="{{old('return_time_2')}}">
								</div>
							</div> --}}

							<div class="col-md-3">
								<div class="form-group">
									{!! Form::label('return_time_2', __('2nd Trip back pick-up time'), ['class' => 'control-label']) !!}
									<input type="text" class="form-control timepicker {{ $errors->has('return_time_2') ? 'is-invalid' : '' }}" id="return_time_2" name="return_time_2" value="{{old('return_time_2')}}">
								</div>
							</div>
		
							<div class="col-md-12">
								<div class="form-group">
									{!! Form::label('return_more_information', __('Enter Hotel or Address and other additional Information if different from trip out drop-off information'), ['class' => 'control-label']) !!}
									{!! Form::textarea('return_more_information', null, ['rows' => 2, 'class' => 'form-control']) !!}
									@if ($errors->has('return_more_information')) <p class="input-error">{{$errors->first('return_more_information')}}</p> @endif
									
								</div>
							</div>
						
						</div>
					@endif
		
					
				@endif
				{{-- end roundtrip information --}}
			</div>
			{{-- end box-body --}}
		</div>
		{{-- end box-header --}}

		{{-- end contact informaciont --}}

		{{-- Conditions --}}


		{{-- end arrival information --}}

		
	</div>
	{{-- end row --}}

	{{-- <div class="col-md-5">
		
		
	</div> --}}
</div>

{{-- <fieldset style="font-size:16px">
<p style="font-weight:bold">Please fill out and submit this form for your Private {{strtoupper($way)}} Airport Transfer</p>

</fieldset> --}}


<div class="form-group">
	<div class="text-center">
		{{-- <div class="col-md-6 col-xs-6 text-right"><a class="btn btn-primary" href="{{URL::to('groundtransfer')}}">BACK</a></div> --}}
		{{-- <div class=""><input class="btn btn-primary" type="submit" value="Click to Submit and Pay" onclick="submitForm(this);"></div> --}}
		<button type="submit" onclick="submitForm(this);" class="btn btn-primary" title="{{ __('Submit') }} ">Click to Submit and Pay</button>

	</div>
</div> 


{!! Form::close() !!}

@endsection

@section('footer')
	<script type="text/javascript">
	var childSeatPrice = {{$childSeatPrice}};
	</script>
	{{-- <script src="{{URL::asset('/btdatepicker/js/bootstrap-datepicker.min.js')}}"></script> --}}
	<script src="{{URL::asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{URL::asset('/js/transfer.js')}}"></script>

	<!-- bootstrap time picker -->
	{{-- <script src="{{URL::asset('plugins/timepicker/bootstrap-timepicker.js')}}"></script> --}}
	<script src="{{URL::asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>

	<!-- Select2 -->
    {{-- <script src="{{URL::asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script> --}}

	{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfq1phqMYn6hQBhI8VbKuQ5FLaVZOjmPg&libraries=geometry,places">
	</script>
	<script src="{{URL::asset('js/locationpicker.jquery.js')}}"></script> --}}

	<script>
		$('.arrival_date').datepicker({
			format: 'yyyy-mm-dd',
			autoclose : true,
            startDate: "-",
            clearBtn: true,
            todayHighlight: true
		});

		$('.return_date').datepicker({
			format: 'yyyy-mm-dd',
			autoclose : true,
            startDate: "-",
            clearBtn: true,
            todayHighlight: true
		});

		// $(function () {
		//   $('[data-toggle="tooltip"]').tooltip();

		//   var frominfo = "";
		//   var toinfo = "";
		//   $("input[name=choose_same_information]").click(function(){
		//   	if ($(this).is(':checked')){
		//   		frominfo = $('#return_from_information').val();
		//   		toinfo = $('#return_to_information').val();
		//   		$('#return_to_information').val($('#from_information').val());
		//   		$('#return_from_information').val($('#to_information').val());
		//   	} else {
		//   		$('#return_from_information').val(frominfo);
		//   		$('#return_to_information').val(toinfo);
		//   	}
		//   })
		// });

		//Timepicker
        $('.timepicker').timepicker({
        showInputs: false, 
        snapToStep: true,
        minuteStep: 5, 
        defaultTime: 'current',    
        icons: {
            up: 'fa fa-arrow-up',
            down: 'fa fa-arrow-down'
        }
		});

		
	</script>

	<script>
		function submitForm(this1)
			{
			//alert('asdasd');
			this1.disabled=true; 
			this1.innerHTML='<i class="fa fa-spinner fa-spin"></i> Please wait…';
			this1.form.submit();
			}
	</script>  
@endsection
