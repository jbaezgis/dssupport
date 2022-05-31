@extends('layouts.app', ['hidesidebar' => 'true', 'menu' => 'ferryshuttle', 'title' => 'Request Ferry & Shuttle'])

@section('head')
	<link rel="stylesheet" href="{{URL::asset('/btdatepicker/css/bootstrap-datepicker.min.css')}}">
@endsection

@section('content')
<h1 class="title">Shuttle & Ferry Combination - Booking Details</h1>

<fieldset>
<p style="font-weight:bold">Please fill out and submit this form for your Ferry & Shuttle Combination Booking Request</p>

<p style="font-size: 14px; color: #004080;font-weight:bold">You selected the Shuttle & Ferry Combination from: {{$hotel->hotel}} Hotel to {{$service->tolocation->location_name}} </p>

<p>Give us please as much information as possible about your upcoming trip (cell. phone number where we can reach you if available, hotel or place you will stay before you start your trip with us). </p>

<p>Cancellation Policy - 48 hours before scheduled departure time 100 % refund, 24 - 48 hours before scheduled departure time 50 % refund, 24 hours or less before scheduled departure time or "No Show" - NO REFUND.</p>
</fieldset>

{!! Form::open(['url' => 'ferryshuttle/store', 'class' => 'form-horizontal'] ) !!}
{!! Form::hidden('service_id', $service->id) !!}
{!! Form::hidden('service_type', 'ferryshuttle') !!}
{!! Form::hidden('hotel', $hotel->hotel) !!}
{!! Form::hidden('hotel_id', $hotel->id) !!}
{!! Form::hidden('alias_location_from', $hotel->hotel.' Hotel') !!}
{!! Form::hidden('alias_location_to', $service->tolocation->location_name) !!}

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
	<legend>Requested Shuttle & Ferry Service</legend>
<div class="form-group">
{!! Form::label('passengers', 'Passengers', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
		<select name="passengers" id="passengers" class="form-control">
			@for ($i = 1; $i < 9; $i++)
			<option>{{$i}}</option>
			@endfor
		</select>
	</div>
</div>

<div class="form-group">
{!! Form::label('arrival_date', 'Trip Date', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
		{!! Form::text('arrival_date', null, ['class' => 'form-control arrival_date']) !!}
		@if ($errors->has('arrival_date')) <p class="input-error">{{$errors->first('arrival_date')}}</p> @endif
	</div>
</div>

<div class="form-group">
{!! Form::label('pickup_time', 'Pickup Time', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
		{!! Form::text('pickup_time', $hotel->pickup_time, ['id' => 'pickup_time', 'readonly' => 'readonly', 'class' => 'form-control']) !!}
	</div>
</div>

@if ($service->tolocation->location_name == 'Samana')
<div class="form-group">
{!! Form::label('', '', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-7">
		<p><strong>Add Shuttle from Pier Samana to your Destination *</strong></p>
		<select id="shuttle_destination" name="shuttle_destination" class="form-control">
			@foreach ($shuttleSamana as $samana)
			<option value="{{$samana->price}}" data-price="{{$samana->price}}">{{$samana->hotel}}</option>
			@endforeach
		</select>
	</div>
</div>
@else
<div class="form-group">
{!! Form::label('', '', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-7">
		<p><strong>Add Shuttle from your Hotel to the Pier Samana*</strong></p>
		{!! Form::text('shuttle_destination', $hotel->hotel, ['readonly' => 'readonly', 'class' => 'form-control']) !!}
	</div>
</div>
@endif

<div class="form-group">
	<label class="control-label col-md-2">Total Fair</label>
	<div class="col-md-6 price_div">Price: $<span id="sp_price">{{number_format((float)$service->price_first_person + $hotel->price, 2, '.', '')}}
	</span> [ Includes Taxes, Fees, Extra - and Catering Payments ]
		
	</div>
</div>

@if ($service->tolocation->location_name == 'Punta Cana')
	<div class="form-group">
	{!! Form::label('', '', ['class' => 'control-label col-md-2']) !!}
		<div class="col-md-7">
			<strong>I am interested in an Overnight Option in Punta Cana  </strong><br />
			<label>{!! Form::radio('interested_overnight', 'yes', true) !!} Yes</label>&nbsp;&nbsp;
			<label>{!! Form::radio('interested_overnight', 'no', false) !!} No</label>
		</div>
	</div>

	<div class="form-group">
	{!! Form::label('', '', ['class' => 'control-label col-md-2']) !!}
		<div class="col-md-7">
			<strong>I am interested in an Excursion to Los Haitises and/or an Overnight Option at "Paraiso Ca&ntilde;o Hondo" </strong><br />
			<label>{!! Form::radio('excursion', 'yes', true) !!} Yes</label>&nbsp;&nbsp;
			<label>{!! Form::radio('excursion', 'no', false) !!} No</label>
			&nbsp;&nbsp;<a href="#"><img src="{{URL::asset('img/btn-details.jpg')}}"></a>
		</div>
	</div>
@endif

<div class="form-group">
{!! Form::label('from_information', 'From Information', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-7">
		{!! Form::textarea('from_information', null, ['rows' => 4, 'class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
{!! Form::label('to_information', 'To Information', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-7">
		{!! Form::textarea('to_information', null, ['rows' => 4, 'class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">
{!! Form::label('other_information', 'Other Information', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-7">
		{!! Form::textarea('other_information', null, ['rows' => 4, 'class' => 'form-control']) !!}
	</div>
</div>

</fieldset>

<div class="form-group">
	<div class="col-md-6 text-right"><a class="btn btn-primary" href="{{URL::to('ferryshuttle')}}">BACK</a></div>
	<div class="col-md-6 text-left"><input class="btn btn-primary" type="submit" id="Clk_submit_booking" value="Book now"></div>
</div> 


{!! Form::close() !!}

@endsection

@section('footer')
	<script src="{{URL::asset('/btdatepicker/js/bootstrap-datepicker.min.js')}}"></script>
	
	<script>
	var price = {{$service->price_first_person}};
	var priceAditionalPerson = {{$service->price_aditional_person}};
	var hotelPrice = {{$hotel->price}};

	$(document).ready(function(){
		function calculatePrice(){
			var passengers  = parseInt($('#passengers').val()) - 1;
			var total  = price + (passengers * priceAditionalPerson);
			total += hotelPrice;

			if ($('#shuttle_destination').length){
				var extra_price = parseFloat($("#shuttle_destination option:selected").data('price'));
				total += extra_price;
			}
	
			$('#sp_price').text(total);
		}

		$('#passengers, #shuttle_destination').change(function(){
			calculatePrice();
		});
	});

	$('.arrival_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose : true,
        startDate: "-",
        clearBtn: true,
        todayHighlight: true
	});
	</script>
@endsection
