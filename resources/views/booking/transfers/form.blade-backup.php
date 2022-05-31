@extends('app', ['menu' => 'groundtransfer', 'hidesidebar' => true, 'title' => "Ground Transfer Request from $service->from_name"])

@section('head')
	<link rel="stylesheet" href="{{URL::asset('/btdatepicker/css/bootstrap-datepicker.min.css')}}">
@endsection

@section('content')
<h1 class="title">Transfers & Shuttle Service(all our Transfers and Shuttles are Private)</h1>

{!! Form::open(['class' => 'form-horizontal', 'route' => 'transfer_submit'] ) !!}
{!! Form::hidden('service_id', $service->id) !!}
{!! Form::hidden('service_type', $service_type) !!}
{!! Form::hidden('type', $way) !!}
{!! Form::hidden('alias_location_from', $service->from_name) !!}
{!! Form::hidden('alias_location_to', $service->to_name) !!}
{!! Form::hidden('driving_time', $service->driving_time) !!}
{!! Form::hidden('from_airport', $service->fromlocation->is_airport) !!}
{!! Form::hidden('to_airport', $service->tolocation->is_airport) !!}


<fieldset style="font-size:16px">
<p style="font-weight:bold">Please fill out and submit this form for your Private {{strtoupper($way)}} Airport Transfer</p>
<p style="font-size: 14px; color: #004080;font-weight:bold">{{$service->from_name}} to {{$service->to_name}} </p>

<p>After submission of this request you can decide upon paying either a down payment via Credit Card or PayPal and the due amount in cash to the driver or pay the total amount online via Credit Card or PayPal.</p>

<p>Give us please as much information as possible about your upcoming trip (cell. phone number where we can reach you - if available, Hotel or Place you will stay before you start your trip with us, Airline, Flight Number and scheduled arrival and/or departure times). </p>

<p><strong>Cancellation Policy</strong> - 48 hour(s) before scheduled Pick up Time 100 % refund, 24 - 48 hour(s) before scheduled Pick up Time time 50 % refund, 24 hour(s) or less before scheduled Pick up Time or "No Show" - NO REFUND.</p>
</fieldset>

<fieldset>
	<legend>Contact Information</legend>
<div class="form-group">
	<label class="control-label col-md-2">Full Name <span>*</span></label>
	<div class="col-md-3"> 
		{!! Form::text('fullname', null, ['class' => 'form-control input-sm']) !!} 
		@if ($errors->has('fullname'))<p class="input-error">{!!$errors->first('fullname')!!}</p>@endif
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Email <span>*</span></label>
	<div class="col-md-3"> 
		{!! Form::email('email', null, ['class' => 'form-control input-sm']) !!} 
		@if ($errors->has('email'))<p class="input-error">{!!$errors->first('email')!!}</p>@endif
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Phone <span>*</span></label>
	<div class="col-md-3"> 
		{!! Form::text('phone', null, ['class' => 'form-control input-sm']) !!} 
		@if ($errors->has('phone'))<p class="input-error">{!!$errors->first('phone')!!}</p>@endif
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Phone in DR</label>
	<div class="col-md-3"> 
		{!! Form::text('phone_dr', null, ['class' => 'form-control input-sm']) !!} 
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Nationality</label>
	<div class="col-md-3"> 
		{!! Form::text('nationality', null, ['class' => 'form-control input-sm']) !!} 
	</div>
</div>
<div class="form-group">
	<div class="col-md-10 col-md-offset-2">
		We require nationality to assure our service team speaks your language. Our team covers Spanish, English, German, Italian, Russian, French, Dutch, Portuguese.
	</div>  
</div>

</fieldset>

<fieldset>
	<legend>Service Information</legend>
<div class="form-group">
	<label class="control-label col-md-2">Location</label>
	<div class="col-md-9"> 
		<h4><strong>From:</strong> {{$service->from_name}} - <strong>To:</strong> {{$service->to_name}}</h4>
	</div>
</div>

<div class="form-group">
	
</div>

<div class="form-group">
	<label class="control-label col-md-2">Vehicle Size</label>
	<div class="col-md-3"> 
		<select name="service_price_id" id="CH_product_variation" class="form-control">
		@foreach ($service->prices as $price)
			@if ($way == 'oneway')
				<option value="{{$price->id}}" data-price="{{$price->oneway_price}}" data-maxpassengers="{{$price->priceOption()->first()->maxpassengers}}">{{$price->priceOption()->first()->name}} - {{$price->oneway_price}}</option>
			@else
				<option value="{{$price->id}}" data-price="{{$price->roundtrip_price}}" data-maxpassengers="{{$price->priceOption()->first()->maxpassengers}}">{{$price->priceOption()->first()->name}} - {{$price->roundtrip_price}}</option>
			@endif
		@endforeach
		</select>
        <strong><i>For 25 or more passengers, please call 809.931.4073</i></strong>
	</div>
</div>

<div class="form-group">
{!! Form::label('passengers', 'Passengers', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
		<select name="passengers" id="passengers" class="form-control">
			
		</select>
	</div>
	{!! Form::label('childseats', 'Childseat(s)', ['class' => 'control-label col-md-1']) !!} 
	<div class="col-md-2"> {!! Form::select('childseats_upto12month', ['0' => 'Free to 1 year', 1 => '1', 2 => '2', 3 => '3'], null, ['class' => 'form-control CH_childseat']) !!} </div>
	<div class="col-md-2"> {!! Form::select('childseats_over1year', ['0' => 'over 1 year old', 1 => '1', 2 => '2', 3 => '3'], null, ['class' => 'form-control CH_childseat']) !!} </div>
</div>

<div class="form-group">
	
</div>

<div class="form-group">
	<label class="control-label col-md-2">Total Fare</label>
	<div class="col-md-6 price_div"><label class="control-label">Price: <span class="price_amount">$<span id="sp_price">
		@if($way=='oneway') 
			{{$service->prices->first()->oneway_price}} 
		@else 
			{{$service->prices->first()->roundtrip_price }}
		@endif</span></span> [ Includes Taxes, Fees and Baby Seat]</label>
	</div>
</div>

</fieldset>

<fieldset>
	@if ($service->fromlocation->is_airport)
		<legend>Arrival Information</legend>
	@elseif ($service->tolocation->is_airport)
		<legend>Departure Information</legend>
	@else
		<legend>Onward Travel Information</legend>
	@endif
<div class="form-group">
	@if ($service->fromlocation->is_airport || $service->tolocation->is_airport)
		{!! Form::label('arrival_date', $service->fromlocation->is_airport ? 'Arrival Date' : 'Departure Date', ['class' => 'control-label col-md-2']) !!}
	@else
		{!! Form::label('arrival_date', 'Travel Date', ['class' => 'control-label col-md-2']) !!}
	@endif
	<div class="col-md-2">
		{!! Form::text('arrival_date', null, ['class' => 'form-control arrival_date', 'autocomplete' => 'off']) !!}
		@if ($errors->has('arrival_date')) <p class="input-error">{{$errors->first('arrival_date')}}</p> @endif
	</div>
</div>

@if ($service->fromlocation->is_airport || $service->tolocation->is_airport)
<div class="form-group">
{!! Form::label('arrival_airline', $service->fromlocation->is_airport ? 'Arrival Airline' : 'Departure Airline', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
		{!! Form::text('arrival_airline', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
{!! Form::label('flight_number', 'Flight Number', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
		{!! Form::text('flight_number', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
{!! Form::label('arrival_time', $service->fromlocation->is_airport ? 'Arrival Time' : 'Departure Time', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-1">
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

	<div class="col-md-1">
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

	<div class="col-md-1">
		<select name="arrival_meridiam" id="arrival_meridiam" class="form-control">
			<option {{old('arrival_meridiam') == 'AM' ? 'selected' : ''}} value="AM">AM</option>
			<option {{old('arrival_meridiam') == 'PM' ? 'selected' : ''}} value="PM">PM</option>
		</select>
	</div>
</div>

@if($service->tolocation->is_airport && $service->fromlocation->is_airport)

@else
@if ($service->tolocation->is_airport)
<div class="form-group">
	{!! Form::label('I_want_to_arrive', 'I (we) want to arrive', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-3">
		<select class="form-control" name="want_to_arrive" id="want_to_arrive">
			@foreach($willArriveData as $k => $v)
			<option value="{{$k}}" {{old('want_to_arrive') == '' && $k=='2:00' ? 'selected' : ''}} {{old('want_to_arrive') == $k ? 'selected' : ''}}>{{$v}}</option>
			@endforeach
		</select>
	</div>
</div>
@endif
@endif

<div class="form-group">
{!! Form::label('pickup_time', 'Pickup Time', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
		{!! Form::text('pickup_time', null, ['id' => 'pickup_time', 'readonly' => 'readonly', 'class' => 'form-control']) !!}
	</div>
	@if ($service->fromlocation->is_airport)
	<div class="col-md-5">
	<img data-toggle="tooltip" data-placement="top" title="The indicated pick-up time is an estimate.  We monitor all flight arrival times.  Rest assured your driver will be waiting as specified in your confirmation email, no matter whether your flight arrival is delayed or early." src="{{URL::asset('img/help.png')}}" alt="">
	</div>
	@endif
</div>

@endif

<div class="form-group">
{!! Form::label('pickme_time', 'Pickup me(us) at', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
        <strong>Choose only if you want a different pick up time</strong>
		<select name="pickme_time" class="form-control">
			<option value="">-Select Time-</option>
			@foreach ($hours as $hour)
				<option value="{{$hour}}">{{$hour}}</option>
			@endforeach
		</select>
	</div>
	@if ($service->fromlocation->is_airport || $service->tolocation->is_airport)
		<!-- <div class="col-md-5">	</div> -->
	@endif
</div>

<div class="form-group">
{!! Form::label('from_information', 'From Information', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-9">
		{!! Form::text('from_information', null, ['rows' => 4, 'class' => 'form-control']) !!}
		@if ($errors->has('from_information')) <p class="input-error">{{$errors->first('from_information')}}</p> @endif
	</div>
</div>

<div class="form-group">
{!! Form::label('to_information', 'To Information', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-9">
		{!! Form::text('to_information', null, ['rows' => 4, 'class' => 'form-control']) !!}
		@if ($errors->has('to_information')) <p class="input-error">{{$errors->first('to_information')}}</p> @endif
	</div>
</div>

</fieldset>

@if ($way == 'roundtrip')
<fieldset>
	@if ($service->tolocation->is_airport && !$service->fromlocation->is_airport)
		<legend>Arrival Information</legend>
	@elseif($service->fromlocation->is_airport)
		<legend>Departure Information</legend>
	@else
		<legend>Return Travel Information</legend>
	@endif
<div class="form-group">
	@if ($service->tolocation->is_airport && !$service->fromlocation->is_airport)
		{!! Form::label('arrival_date', $service->tolocation->is_airport ? 'Arrival Date' : 'Return Date', ['class' => 'control-label col-md-2']) !!}
	@else
		{!! Form::label('arrival_date', 'Return Date', ['class' => 'control-label col-md-2']) !!}
	@endif
	<div class="col-md-2">
		{!! Form::text('return_date', null, ['class' => 'form-control arrival_date']) !!}
		@if ($errors->has('return_date')) <p class="input-error">{{$errors->first('return_date')}}</p> @endif
	</div>
</div>

@if ($service->tolocation->is_airport || $service->fromlocation->is_airport)
<div class="form-group">
{!! Form::label('return_airline', $service->tolocation->is_airport && !$service->fromlocation->is_airport ? 'Arrival Airline' : 'Departure Airline', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-9">
		{!! Form::text('return_airline', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
{!! Form::label('return_flight_number', 'Flight Number', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-9">
		{!! Form::text('return_flight_number', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
{!! Form::label('return_arrival_time', $service->tolocation->is_airport && !$service->fromlocation->is_airport ? 'Arrival Time' : 'Departure Time', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
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

	<div class="col-md-2">
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

	<div class="col-md-2">
		<select name="return_meridiam" id="return_meridiam" class="form-control">
			<option {{old('return_meridiam') == 'AM' ? 'selected' : ''}} value="AM">AM</option>
			<option {{old('return_meridiam') == 'PM' ? 'selected' : ''}} value="PM">PM</option>
		</select>
	</div>
</div>

@if ($service->fromlocation->is_airport)
<div class="form-group">
	{!! Form::label('return_want_to_arrive', 'I (we) want to arrive', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-3">
		<select class="form-control" name="return_want_to_arrive" id="return_want_to_arrive">
			@foreach($willArriveData as $k => $v)
			<option value="{{$k}}" {{old('want_to_arrive') == '' && $k=='2:00' ? 'selected' : ''}} {{old('want_to_arrive') == $k ? 'selected' : ''}}>{{$v}}</option>
			@endforeach
		</select>
	</div>
</div>
@endif

<div class="form-group">
{!! Form::label('return_pickup_time', 'Pickup Time', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
		{!! Form::text('return_pickup_time', null, ['id' => 'return_pickup_time', 'readonly' => 'readonly', 'class' => 'form-control']) !!}
	</div>
	@if ($service->tolocation->is_airport)
	<div class="col-md-5"><img data-toggle="tooltip" data-placement="top" title="The indicated pick-up time is an estimate.  We monitor all flight arrival times.  Rest assured your driver will be waiting as specified in your confirmation email, no matter whether your flight arrival is delayed or early." src="{{URL::asset('img/help.png')}}" alt=""></div>
	@endif
</div>

@endif

<div class="form-group">
{!! Form::label('return_pickme_time', 'Pickup me(us) at', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
        <strong>Choose only if you want a different pick up time</strong>
		<select name="return_pickme_time" class="form-control">
			<option value="">-Select Time-</option>
			@foreach ($hours as $hour)
				<option value="{{$hour}}">{{$hour}}</option>
			@endforeach
		</select>
	</div>
	@if ($service->fromlocation->is_airport || $service->tolocation->is_airport)
		
	@endif
</div>

<div class="form-group">
	<div class="col-md-7 col-md-offset-2">
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
</div>

<div class="form-group">
{!! Form::label('return_from_information', 'From Information', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-9">
		{!! Form::textarea('return_from_information', null, ['rows' => 4, 'class' => 'form-control']) !!}
		@if ($errors->has('return_from_information')) <p class="input-error">{{$errors->first('return_from_information')}}</p> @endif
	</div>
</div>

<div class="form-group">
{!! Form::label('return_to_information', 'To Information', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-9">
		{!! Form::textarea('return_to_information', null, ['rows' => 4, 'class' => 'form-control']) !!}
		@if ($errors->has('return_to_information')) <p class="input-error">{{$errors->first('return_to_information')}}</p> @endif
	</div>
</div>

</fieldset>
@endif

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
