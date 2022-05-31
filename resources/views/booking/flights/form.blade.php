@extends('app', ['hidesidebar' => true, 'menu' => 'scheduledflight', 'title' => "Request Schedule Flights From $service->from_name"])

@section('head')
	<link rel="stylesheet" href="{{URL::asset('/btdatepicker/css/bootstrap-datepicker.min.css')}}">
@endsection

@section('content')
<h1 class="title">Regular Flights - Booking Form</h1>

{!! Form::open(['url' => 'submit-flight-service', 'class' => 'form-horizontal', 'id' => 'bookingForm'] ) !!}

{!! Form::hidden('service_id', $service->id) !!}
{!! Form::hidden('service_type', $service_type) !!}
{!! Form::hidden('type', $way) !!}
{!! Form::hidden('alias_location_from', $service->from_name) !!}
{!! Form::hidden('alias_location_to', $service->to_name) !!}

<fieldset style="font-size:16px">
<div class="row">
	<div class="col-md-12">
		@if ($way == 'oneway')
			<p style="font-weight:bold">Please fill out and submit this form for your One Way Regular Flight Request</p>
		@else
			<p style="font-weight:bold">Please fill out and submit this form for your Round Trip Regular Flight Request</p>
		@endif
		<p style="font-size: 14px; color: #004080;font-weight:bold">{{$service->from_name}} to {{$service->to_name}} </p>

		<p>Give us please as much information as possible about your upcoming trip (cell. phone number where we can reach you if available, hotel or place you will stay before your trip with us, flight numbers of international connection flights, so we can monitor if there are delays, etc.) </p>

		<p><strong>Cancellation Policy</strong> : 14 days or more before scheduled departure time 100 % refund, 2-14 days before scheduled departure time 75 % refund, 48 hours or less before scheduled departure time or ‘No Show’ - NO REFUND. </p>

		@if(($service->id == 595 || $service->id == 596) || ($service->from ==32 && $service->to==8) || ($service->from==8 && $service->to==32))
			<p style="color:red; font-weight:bold">Please note this price includes the PAP airport departure tax of U$ 55.00 per passenger. You will NOT have to pay this tax at PAP airport</p>
		@endif
	</div>
	<div class="col-md-4">

	</div>
</div>
</fieldset>

<div class="alert alert-danger form-errors" role="alert" style="display:none"></div>

<fieldset>
	<legend>Contact Information</legend>
<div class="form-group">
	<label class="control-label col-md-2">Full Name <span>*</span></label>
	<div class="col-md-7">
		{!! Form::text('fullname', null, ['class' => 'form-control input-sm']) !!}
		@if ($errors->has('fullname'))<p class="input-error">{!!$errors->first('fullname')!!}</p>@endif
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Email <span>*</span></label>
	<div class="col-md-7">
		{!! Form::email('email', null, ['class' => 'form-control input-sm']) !!}
		@if ($errors->has('email'))<p class="input-error">{!!$errors->first('email')!!}</p>@endif
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Phone <span>*</span></label>
	<div class="col-md-2">
		{!! Form::text('phone', null, ['class' => 'form-control input-sm']) !!}
		@if ($errors->has('phone'))<p class="input-error">{!!$errors->first('phone')!!}</p>@endif
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Phone in DR</label>
	<div class="col-md-2">
		{!! Form::text('phone_dr', null, ['class' => 'form-control input-sm']) !!}
	</div>
</div>
</fieldset>

<fieldset>
	<legend>Requested Onward Flight</legend>
<div class="form-group">
	<label class="control-label col-md-2">From</label>
	<div class="col-md-7">
		{{$service->from_name}}
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">To</label>
	<div class="col-md-7">
		{{$service->to_name}}
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Passengers</label>
	<div class="col-md-7">
		<select name="service_price_id" id="CH_product_variation" class="form-control">
		@foreach ($service->prices as $price)
			@if ($way == 'oneway')
			<option value="{{$price->id}}" data-price="{{$price->oneway_price}}" data-maxpassengers="{{$price->priceOption()->first()->maxpassengers}}">{{$price->priceOption()->first()->name}} - {{$price->oneway_price}}</option>
			@else
			<option value="{{$price->id}}" data-price="{{$price->roundtrip_price}}" data-maxpassengers="{{$price->priceOption()->first()->maxpassengers}}">{{$price->priceOption()->first()->name}} - {{$price->roundtrip_price}}</option>
			@endif
		@endforeach
		</select>
	</div>
</div>

<div class="form-group">
	{!! Form::label('childseats', 'Infant(s)', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-5"> {!! Form::select('child_seat', ['0' => 'under 2 years', 1 => '1', 2 => '2', 3 => '3'], null, ['class' => 'form-control CH_childseat']) !!}
		 [  less than 2 years old (<24 months) - no seat ]
	</div>
</div>

<div class="form-group">
	{!! Form::label('childseats', 'Price per passenger', ['class' => 'control-label col-md-2']) !!}
	@if ($way == 'oneway')
	<div class="col-md-5">$<span id="price_per_passenger">{{$service->prices->first()->oneway_price}}</span></div>
	@else
	<div class="col-md-5">$<span id="price_per_passenger">{{$service->prices->first()->roundtrip_price}}</span></div>
	@endif
</div>

<div class="form-group">
	{!! Form::label('childseats', 'Price per infant', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-5">${{$service->price_per_children}}</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Shuttle Payment</label>
	<div class="col-md-7">
		<span id="shuttle_payment">0.00</span>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Total Fair</label>
	<div class="col-md-6 price_div">Price: $<span id="sp_price">
		{{$way == 'oneway' ? $service->prices->first()->oneway_price : $service->prices->first()->roundtrip_price}}
		</span> [ Includes Taxes, Fees, Extra - and Catering Payments ]
	</div>
</div>


<div class="form-group">
{!! Form::label('arrival_date', 'Date of flight', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
		{!! Form::text('arrival_date', null, ['class' => 'form-control arrival_date']) !!}
		@if ($errors->has('arrival_date')) <p class="input-error">{{$errors->first('arrival_date')}}</p> @endif
	</div>
</div>

<div class="form-group">
{!! Form::label('', 'Flight Departure Time', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
		{{$service->driving_time}}
	</div>
</div>

<div class="form-group">
{!! Form::label('', 'Flight Arrival Time', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
		{{$service->arrival_time}}
	</div>
</div>

<div class="form-group">
{!! Form::label('', 'Pick Up Time', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-7">
		<input name="hotel_pickup_time" readonly="readonly" id="hotel_pickedup" style="border:none; width:80px">

		@if($service->from == 32 || $service->to == 32)
				[ If no optional shuttle was chosen, for international flights, please be at the airport for your check-in 90 minutes before your flight departure   ]
		@else
				[ If no optional shuttle was chosen, for domestic flights, please be at the airport for your check-in 45 minutes before your flight departure   ]
		@endif
	</div>
</div>
</fieldset>

<fieldset>
	<legend>Passengers Information</legend>
<div id="passengers_template">
	<div class="form-group">
		<div class="col-md-1 text-right">
			1
		</div>
		<div class="col-md-2">
			<input type="text" name="passenger_firstname[]" class="form-control" placeholder="First Name">
		</div>
		<div class="col-md-2">
			<input type="text" name="passenger_lastname[]" class="form-control" placeholder="Last Name">
		</div>
		<div class="col-md-2">
			<input type="text" name="passenger_nationality[]" class="form-control" placeholder="Nationality">
		</div>
		<div class="col-md-2">
			<input type="text" name="passenger_passport_number[]" class="form-control" placeholder="Passport #">
		</div>
	</div>
</div>
<div id="passengers_wrapp">

</div>
</fieldset>

<fieldset>
	<legend>Add Your Optional Airport Shuttle Service & Other Information</legend>
	@include('booking.flights._form_aditional_shuttle_to', [
		'service' => $service,
		'shuttles' => $shuttlesFromDestionationAirport
	])

	@include('booking.flights._form_aditional_shuttle_from', [
		'service' => $service,
		'shuttles' => $shuttlesToDestionationAirport
	])

<hr />

</fieldset>

@if ($way == 'roundtrip')
<fieldset>
	<legend>Requested Return Flight</legend>
<div class="form-group">
	<label class="control-label col-md-2">From</label>
	<div class="col-md-7">
		{{$service->to_name}}
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-2">To</label>
	<div class="col-md-7">
		{{$service->from_name}}
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-2">Fare per Person US$</label>
	<div class="col-md-7">
		@if($way == 'oneway')
		<span id="fare_per_person_return">{{$service->prices->first()->oneway_price}}</span>
		@else
		<span id="fare_per_person_return">{{$service->prices->first()->roundtrip_price}}</span>
		@endif
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-2">Fare per Infant</label>
	<div class="col-md-7">
		0.00
	</div>
</div>
<div class="form-group">
	<label class="control-label col-md-2">Shuttle Payment</label>
	<div class="col-md-7">
		<span id="shuttle_payment_return">0.00</span>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Total Return Fare U$ </label>
	<div class="col-md-7">
	@if($way == 'oneway')
		<span id="return_fare">{{number_format($service->prices->first()->oneway_price, 2,'.', ',')}}</span>
	@else
		<span id="return_fare">{{number_format($service->prices->first()->roundtrip_price, 2,'.', ',')}}</span>
	@endif
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Total Round-Trip Fare U$ </label>
	<div class="col-md-7">
		<span id="total_roundtrip" style="color:blue;font-weight:bold">{{number_format($service->prices->first()->roundtrip_price * 2, 2,'.', ',')}}</span>
	</div>
</div>

<div class="form-group">
{!! Form::label('arrival_date_return', 'Date of flight', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
		{!! Form::text('arrival_date_return', null, ['class' => 'form-control arrival_date']) !!}
		@if ($errors->has('arrival_date_return')) <p class="input-error">{{$errors->first('arrival_date_return')}}</p> @endif
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Flight Departure Time</label>
	<div class="col-md-7">
		<span>{{$service->departure_time_return}}</span>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Flight Arrival Time </label>
	<div class="col-md-7">
		<span>{{$service->arrival_time_return}}</span>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Hotel Pick Up Time  </label>
	<div class="col-md-7">
		<input type="text" id="hotel_pickedup_return" name="hotel_pickedup_return" style="border:none; width:80px">
		@if($service->from == 32 || $service->to == 32)
				[ If no optional shuttle was chosen, for international flights, please be at the airport for your check-in 90 minutes before your flight departure   ]
		@else
				[ If no optional shuttle was chosen, for domestic flights, please be at the airport for your check-in 45 minutes before your flight departure   ]
		@endif
	</div>
</div>
</fieldset>

<fieldset>
	<legend>Add Your Optional Airport Shuttle Service & Other Information</legend>

		@include('booking.flights._form_aditional_shuttle_to_return', [
			'service' => $service,
			'shuttles' => $shuttlesToDestionationAirport
		])

		@include('booking.flights._form_aditional_shuttle_from_return', [
			'service' => $service,
			'shuttles' => $shuttlesFromDestionationAirport
		])
</fieldset>

@endif

<hr />

<div class="form-group">
	<div class="col-md-6 text-right"><a class="btn btn-primary" href="{{URL::to('scheduledflight')}}">BACK</a></div>
	<div class="col-md-6 text-left"><input class="btn btn-primary" type="button" id="Clk_submit_booking" value="Book now"></div>
</div>  <br /><br /><br /><br /><br /><br /><br />


{!! Form::close() !!}

@endsection

@section('footer')
	@include('booking.flights._flight_js', [
		'service' => $service,
		'way' => $way
	])
@endsection
