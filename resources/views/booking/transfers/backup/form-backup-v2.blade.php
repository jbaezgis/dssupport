@extends('app', ['menu' => 'groundtransfer', 'hidesidebar' => true, 'title' => "Ground Transfer Request from $service->from_name"])

@section('head')
	<link rel="stylesheet" href="{{URL::asset('/btdatepicker/css/bootstrap-datepicker.min.css')}}">
@endsection

@section('content')
{{-- <h1 class="title">Transfers & Shuttle Service(all our Transfers and Shuttles are Private)</h1> --}}
<div class="row">
	<div class="col-md-12">
		<a href="/services" class="btn btn-primary">{{ __('Go back to Services') }} </a>
	</div>
</div>
<hr>

{!! Form::open(['class' => '', 'route' => 'transfer_submit'] ) !!}
{!! Form::hidden('service_id', $service->id) !!}
{!! Form::hidden('service_type', $service_type) !!}
{!! Form::hidden('type', $way) !!}
{!! Form::hidden('alias_location_from', $service->from_name) !!}
{!! Form::hidden('alias_location_to', $service->to_name) !!}
{!! Form::hidden('driving_time', $service->driving_time) !!}
{!! Form::hidden('from_airport', $service->fromlocation->is_airport) !!}
{!! Form::hidden('to_airport', $service->tolocation->is_airport) !!}

<div class="row text-center">
	<div class="col-md-12">
		<h3 class="">Private shuttle transfer service</h3>

		<h3>{{ __('From')}}: <span class="text-primary">{{$service->from_name}}</span> {{ __('To')}}: <span class="text-primary">{{$service->to_name}}</span> </h3>
		
		<div class="row text-center">
			<div class="col-md-12">
				<div class="btn-group" role="group" aria-label="...">
					<a class="btn {{ $way == 'oneway' ? 'btn-primary' : 'btn-default'}} btn-lg" href="{{url('request-ground-transfer-service?service='.$service->id.'&way=oneway&aFrom=0'.'&aTo=0')}}">One Way ${{$service->prices->first()->oneway_price}}</a>
					<a class="btn {{ $way == 'roundtrip' ? 'btn-primary' : 'btn-default'}} btn-lg" href="{{url('request-ground-transfer-service?service='.$service->id.'&way=roundtrip&aFrom=0'.'&aTo=0')}}">Round Trip ${{$service->prices->first()->roundtrip_price}}</a>
				</div>
			</div>
		</div>

		{{-- <p>After submission of this request you can decide upon paying either a down payment via Credit Card or PayPal and the due amount in cash to the driver or pay the total amount online via Credit Card or PayPal.</p>

		<p>Give us please as much information as possible about your upcoming trip (cell. phone number where we can reach you - if available, Hotel or Place you will stay before you start your trip with us, Airline, Flight Number and scheduled arrival and/or departure times). </p>

		<p><strong>Cancellation Policy</strong> - 48 hour(s) before scheduled Pick up Time 100 % refund, 24 - 48 hour(s) before scheduled Pick up Time time 50 % refund, 24 hour(s) or less before scheduled Pick up Time or "No Show" - NO REFUND.</p> --}}
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-7">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Contact Information</h3>
			</div>
			{{-- end box-header --}}
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">First/Last Name <span>*</span></label>
							{!! Form::text('fullname', null, ['class' => 'form-control']) !!} 
							@if ($errors->has('fullname'))<p class="input-error">{!!$errors->first('fullname')!!}</p>@endif
						</div>
					</div>
					{{-- end col --}}

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Email <span>*</span></label>
							{!! Form::email('email', null, ['class' => 'form-control']) !!} 
							@if ($errors->has('email'))<p class="input-error">{!!$errors->first('email')!!}</p>@endif
						</div>
					</div>
					{{-- end col --}}

					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Phone <span>*</span></label>
							{!! Form::text('phone', null, ['class' => 'form-control']) !!} 
							@if ($errors->has('phone'))<p class="input-error">{!!$errors->first('phone')!!}</p>@endif
						</div>
					</div>
					{{-- end col --}}
					{{-- <div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Phone in DR (Optional)</label>
							{!! Form::text('phone_dr', null, ['class' => 'form-control']) !!} 
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Nationality</label>
							{!! Form::text('nationality', null, ['class' => 'form-control']) !!} 
							<small>We require nationality to assure our service team speaks your language. Our team covers Spanish, English, German, Italian, Russian, French, Dutch, Portuguese.</small>
						</div>
					</div> --}}
					{{-- end col --}}
				</div>
				{{-- end row --}}
				
			</div>
			{{-- end box-body --}}
		</div>
		{{-- end box-header --}}

		{{-- end contact informaciont --}}

		{{-- start  --}}
		<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">
						@if ($service->fromlocation->is_airport)
							Arrival Information
						@elseif ($service->tolocation->is_airport)
							Departure Information
						@else
							Onward Travel Information
						@endif
					</h3>
				</div>
				{{-- end box-header --}}

				<div class="box-body">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								@if ($service->fromlocation->is_airport || $service->tolocation->is_airport)
									{!! Form::label('arrival_date', $service->fromlocation->is_airport ? 'Arrival Date' : 'Departure Date', ['class' => 'control-label']) !!}
								@else
									{!! Form::label('arrival_date', 'Travel Date', ['class' => 'control-label']) !!}
								@endif
									{!! Form::text('arrival_date', null, ['class' => 'form-control arrival_date', 'autocomplete' => 'off']) !!}
									@if ($errors->has('arrival_date')) <p class="input-error">{{$errors->first('arrival_date')}}</p> @endif
							</div>
						</div>

						{{-- start if for is_airport --}}
						@if ($service->fromlocation->is_airport || $service->tolocation->is_airport)
						<div class="col-md-6">
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
						
						@if ($service->tolocation->is_airport)
						<div class="col-md-12">
							<div class="form-group">
								<div class="row row-flex row-flex-wrap">
									<div class="col-md-3">
										{!! Form::label('arrival_time', $service->fromlocation->is_airport ? 'Arrival Time' : 'Departure Time', ['class' => 'control-label']) !!}
							
										<select name="arrival_hour" id="arrival_hour" class="form-control">
											<option value="">HH</option>
										@for($i = 1; $i <= 12; $i++)
											@if ($i < 10)
												<option {{old('arrival_hour') == '0'.$i ? 'selected' : ''}} value="0{{$i}}">0{{$i}}</option>
											@else
												<option {{old('arrival_hour') == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
											@endif
										@endfor
										</select>
									</div>
	
									<div class="col-md-2" style="margin-top: 23px;">
										<select name="arrival_minutes" id="arrival_minutes" class="form-control">
											@for($i = 0; $i <= 59; $i++)
												@if ($i < 10)
													<option {{old('arrival_minutes') == '0'.$i ? 'selected' : ''}} value="0{{$i}}">0{{$i}}</option>
												@else
													<option {{old('arrival_minutes') == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
												@endif
											@endfor
										</select>
									</div>
	
									<div class="col-md-2" style="margin-top: 23px;">
										<select name="arrival_meridiam" id="arrival_meridiam" class="form-control">
											<option {{old('arrival_meridiam') == 'AM' ? 'selected' : ''}} value="AM">AM</option>
											<option {{old('arrival_meridiam') == 'PM' ? 'selected' : ''}} value="PM">PM</option>
										</select>
									</div>
	
									<div class="col-md-4">
										<div class="form-group">
											{!! Form::label('pickup_time', 'Pickup Time', ['class' => 'control-label']) !!} <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="The indicated pick-up time is an estimate.  We monitor all flight arrival times.  Rest assured your driver will be waiting as specified in your confirmation email, no matter whether your flight arrival is delayed or early." alt=""></i>
											{!! Form::text('pickup_time', null, ['id' => 'pickup_time', 'readonly' => 'readonly', 'class' => 'form-control']) !!}
											
											@if ($service->fromlocation->is_airport)
											<div class="col-md-5">
											
											</div>
											@endif
										</div>
									</div>
								</div>
								
							</div>
						</div>
						@endif
						
						<div class="col-md-4">
							@if($service->tolocation->is_airport && $service->fromlocation->is_airport)
						
							@else
								@if ($service->tolocation->is_airport)
								<div class="form-group">
									{!! Form::label('I_want_to_arrive', 'I (we) want to arrive', ['class' => 'control-label']) !!}
									
									<select class="form-control" name="want_to_arrive" id="want_to_arrive">
										@foreach($willArriveData as $k => $v)
										<option value="{{$k}}" {{old('want_to_arrive') == '' && $k=='2:00' ? 'selected' : ''}} {{old('want_to_arrive') == $k ? 'selected' : ''}}>{{$v}}</option>
										@endforeach
									</select>
									
								</div>
								@endif
							@endif

							<div class="form-group">
							{!! Form::label('pickme_time', 'Pickup me(us) at', ['class' => 'control-label']) !!}
								
									<strong>Choose only if you want a different pick up time</strong>
									<select name="pickme_time" class="form-control">
										<option value="">-Select Time-</option>
										@foreach ($hours as $hour)
											<option value="{{$hour}}">{{$hour}}</option>
										@endforeach
									</select>
								
								@if ($service->fromlocation->is_airport || $service->tolocation->is_airport)
									<!-- <div class="col-md-5">	</div> -->
								@endif
							</div>
						</div>
						@endif
						{{-- endif for is_airport --}}
					</div>
					
					
					
					
					
					<div class="form-group">
						{!! Form::label('from_information', __('Enter hotel or address and other addtional information'), ['class' => 'control-label']) !!}
						{!! Form::textarea('from_information', null, ['rows' => 2, 'class' => 'form-control']) !!}
						@if ($errors->has('from_information')) <p class="input-error">{{$errors->first('from_information')}}</p> @endif
					</div>
					
					{{-- <div class="form-group">
						{!! Form::label('to_information', 'To Information', ['class' => 'control-label']) !!}
						{!! Form::text('to_information', null, ['rows' => 4, 'class' => 'form-control']) !!}
						@if ($errors->has('to_information')) <p class="input-error">{{$errors->first('to_information')}}</p> @endif
					</div> --}}
				</div>
				{{-- end box-body --}}

				<div class="box-footer">

				</div>
				{{-- end box-footer --}}
		</div>
		{{-- end col-7 --}}
		{{-- end arribal information --}}

		{{-- start roundtrip information --}}
		@if ($way == 'roundtrip')
			<div class="box box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">
								@if ($service->tolocation->is_airport && !$service->fromlocation->is_airport)
								Arrival Information
							@elseif($service->fromlocation->is_airport)
								Departure Information
							@else
								Return Travel Information
							@endif
						</h3>
					</div>
					{{-- end box-header --}}

					<div class="box-body">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									@if ($service->tolocation->is_airport && !$service->fromlocation->is_airport)
										{!! Form::label('arrival_date', $service->tolocation->is_airport ? 'Arrival Date' : 'Return Date', ['class' => 'control-label']) !!}
									@else
										{!! Form::label('arrival_date', 'Return Date', ['class' => 'control-label']) !!}
									@endif
									
									{!! Form::text('return_date', null, ['class' => 'form-control arrival_date']) !!}
									@if ($errors->has('return_date')) <p class="input-error">{{$errors->first('return_date')}}</p> @endif
									
								</div>
							</div>

							@if ($service->tolocation->is_airport || $service->fromlocation->is_airport)
							<div class="col-md-6">
								<div class="form-group">
									{!! Form::label('return_airline', $service->tolocation->is_airport && !$service->fromlocation->is_airport ? 'Arrival Airline' : 'Departure Airline', ['class' => 'control-label']) !!}
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
									{!! Form::label('return_arrival_time', $service->tolocation->is_airport && !$service->fromlocation->is_airport ? 'Arrival Time' : 'Departure Time', ['class' => 'control-label']) !!}
									
										<select name="return_hour" id="return_hour" class="form-control">
											<option value="">HH</option>
										@for($i = 1; $i <= 12; $i++)
											@if ($i < 10)
												<option {{old('return_hour') == '0'.$i ? 'selected' : ''}} value="0{{$i}}">0{{$i}}</option>
											@else
												<option {{old('return_hour') == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
											@endif
										@endfor
										</select>
								</div>
							</div>
								
							<div class="col-md-2" style="margin-top: 24px;">
								<select name="return_minutes" id="return_minutes" class="form-control">
								@for($i = 0; $i <= 59; $i++)
									@if ($i < 10)
										<option {{old('return_minutes') == '0'.$i ? 'selected' : ''}} value="0{{$i}}">0{{$i}}</option>
									@else
										<option {{old('return_minutes') == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
									@endif
								@endfor
								</select>
							</div>
								
							<div class="col-md-2" style="margin-top: 24px;">
								<select name="return_meridiam" id="return_meridiam" class="form-control">
									<option {{old('return_meridiam') == 'AM' ? 'selected' : ''}} value="AM">AM</option>
									<option {{old('return_meridiam') == 'PM' ? 'selected' : ''}} value="PM">PM</option>
								</select>
							</div>
							@if ($service->fromlocation->is_airport)
							<div class="col-md-4">
								<div class="form-group">
									{!! Form::label('return_want_to_arrive', 'I (we) want to arrive', ['class' => 'control-label']) !!}
									
									<select class="form-control" name="return_want_to_arrive" id="return_want_to_arrive">
										@foreach($willArriveData as $k => $v)
										<option value="{{$k}}" {{old('want_to_arrive') == '' && $k=='2:00' ? 'selected' : ''}} {{old('want_to_arrive') == $k ? 'selected' : ''}}>{{$v}}</option>
										@endforeach
									</select>
								</div>
							</div>
							@endif

							<div class="col-md-4">
								<div class="form-group">
									{!! Form::label('return_pickup_time', 'Pickup Time', ['class' => 'control-label']) !!} @if ($service->tolocation->is_airport)
									<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="The indicated pick-up time is an estimate.  We monitor all flight arrival times.  Rest assured your driver will be waiting as specified in your confirmation email, no matter whether your flight arrival is delayed or early." alt=""></i>
									@endif
									{!! Form::text('return_pickup_time', null, ['id' => 'return_pickup_time', 'readonly' => 'readonly', 'class' => 'form-control']) !!}
									
									
								</div>	
							</div>
					
							@endif
							{{-- end if --}}

							<div class="col-md-8">
								<div class="form-group">
									{!! Form::label('return_pickme_time', 'Pickup me(us) at', ['class' => 'control-label']) !!}
									
										<strong>Choose only if you want a different pick up time</strong>
										<select name="return_pickme_time" class="form-control">
											<option value="">-Select Time-</option>
											@foreach ($hours as $hour)
												<option value="{{$hour}}">{{$hour}}</option>
											@endforeach
										</select>
									
									@if ($service->fromlocation->is_airport || $service->tolocation->is_airport)
										
									@endif
								</div>
							</div>
							
							{{-- <div class="col-md-12">
								<div class="form-group">
									
										<label for="">{!! Form::checkbox('choose_same_information', 'Yes') !!}
											@if ($service->tolocation->is_airport || $service->fromlocation->is_airport)
												@if ($service->tolocation->is_airport)
													Choose, If the Arrival Information is Same as Departure Information
												@else
													Choose, If the Departure Information is Same as Arrival Information
												@endif
											@else
												Choose, If the Return Travel Information is Same as Onward Travel Information
											@endif
										</label>
									
								</div>
							</div> --}}

							<div class="col-md-12">
								<div class="form-group">
									{!! Form::label('return_from_information', __('Enter changed or additional information'), ['class' => 'control-label']) !!}
									{!! Form::textarea('return_from_information', null, ['rows' => 2, 'class' => 'form-control']) !!}
									@if ($errors->has('return_from_information')) <p class="input-error">{{$errors->first('return_from_information')}}</p> @endif
									
								</div>
							</div>
							
							{{-- <div class="col-md-12">
								<div class="form-group">
									{!! Form::label('return_to_information', 'To Information', ['class' => 'control-label']) !!}
									{!! Form::textarea('return_to_information', null, ['rows' => 4, 'class' => 'form-control']) !!}
									@if ($errors->has('return_to_information')) <p class="input-error">{{$errors->first('return_to_information')}}</p> @endif
									
								</div>
							</div> --}}
							
						</div>
						{{-- end row --}}
					</div>
					{{-- end box-body --}}
			</div>
		@endif
		{{-- end roundtrip information --}}
		
	</div>
	{{-- end row --}}

	<div class="col-md-5">
		
		<div class="box box-primary box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">{{ __('Booking options') }}</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body ">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">{{ __('Vehicle Size') }}</label>
							
								<select name="service_price_id" id="CH_product_variation" class="form-control">
								@foreach ($service->prices as $price)
									@if ($way == 'oneway')
										<option value="{{$price->id}}" data-price="{{$price->oneway_price}}" data-maxpassengers="{{$price->priceOption()->first()->maxpassengers}}">{{$price->priceOption()->first()->name}} - {{$price->oneway_price}}</option>
									@else
										<option value="{{$price->id}}" data-price="{{$price->roundtrip_price}}" data-maxpassengers="{{$price->priceOption()->first()->maxpassengers}}">{{$price->priceOption()->first()->name}} - {{$price->roundtrip_price}}</option>
									@endif
								@endforeach
								</select>
								<strong><i>{{ __('For large groups call (829) 820-5200') }}</i></strong>
						</div>
						
					</div>

					<div class="col-md-6">
						<div class="form-group">
							{!! Form::label('passengers', 'Passengers', ['class' => '']) !!}
							<select name="passengers" id="passengers" class="form-control">
								
							</select>
						</div>

					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
								{!! Form::label('childseats', 'Childseat(s)', ['class' => '']) !!} 
								{!! Form::select('childseats_upto12month', ['0' => 'Under 1 year', 1 => '1', 2 => '2', 3 => '3'], null, ['class' => 'form-control CH_childseat']) !!} 
						</div>

					</div>

					<div class="col-md-6">
						{!! Form::label('', '', ['class' => '']) !!}
						{!! Form::select('childseats_over1year', ['0' => 'over 1 year old', 1 => '1', 2 => '2', 3 => '3'], null, ['class' => 'form-control CH_childseat']) !!} 

					</div>

				</div>
				
				<p></p>
				
				
				
				
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<h4>
					Total:
					<span class="price_amount">$
					<span id="sp_price">
					@if($way=='oneway') 
						{{$service->prices->first()->oneway_price}} 
					@else 
						{{$service->prices->first()->roundtrip_price }}
					@endif
					</span></span>
				</h4>
					</span>Includes Taxes, Fees and Baby Seat</span> 
			</div>
		</div>
	</div>
</div>

{{-- <fieldset style="font-size:16px">
<p style="font-weight:bold">Please fill out and submit this form for your Private {{strtoupper($way)}} Airport Transfer</p>

</fieldset> --}}


<div class="form-group">
	<div class="text-center">
		<div class="col-md-6 col-xs-6 text-right"><a class="btn btn-primary" href="{{URL::to('groundtransfer')}}">BACK</a></div>
		<div class="col-md-6 col-xs-6 text-left"><input class="btn btn-primary" type="submit" value="SUBMIT & NEXT"</div>

	</div>
</div> 


{!! Form::close() !!}

@endsection

@section('footer')
	<script type="text/javascript">
	var childSeatPrice = {{$childSeatPrice}};
	</script>
	<script src="{{URL::asset('/btdatepicker/js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{URL::asset('/js/transfer.js')}}"></script>

	<script>
		$('.arrival_date').datepicker({
			format: 'yyyy-mm-dd',
			autoclose : true,
            startDate: "-",
            clearBtn: true,
            todayHighlight: true
		});

		$(function () {
		  $('[data-toggle="tooltip"]').tooltip();

		  var frominfo = "";
		  var toinfo = "";
		  $("input[name=choose_same_information]").click(function(){
		  	if ($(this).is(':checked')){
		  		frominfo = $('#return_from_information').val();
		  		toinfo = $('#return_to_information').val();
		  		$('#return_to_information').val($('#from_information').val());
		  		$('#return_from_information').val($('#to_information').val());
		  	} else {
		  		$('#return_from_information').val(frominfo);
		  		$('#return_to_information').val(toinfo);
		  	}
		  })
		})
	</script>
@endsection
