@extends('layouts.app', ['hidesidebar' => 'true', 'menu' => 'charters', 'title' => "Charter Request from $fromlocation->location_name" ])

@section('head')
	<link rel="stylesheet" href="{{URL::asset('/btdatepicker/css/bootstrap-datepicker.min.css')}}">
@endsection

@section('content')
<h1 class="title">Charters and Jets - Booking Form</h1>

{!! Form::open(['url' => 'charters/store', 'class' => 'form-horizontal', 'id' => 'bookingForm'] ) !!}

{!! Form::hidden('from_id', $from) !!}
{!! Form::hidden('to_id', $to) !!}
{!! Form::hidden('aircraft_id', $aircraft->id) !!}

<fieldset style="font-size:16px">
<div class="row">
	<div class="col-md-12">
		<p style="font-weight:bold">Please fill out and submit this form for your One way Private Charter Flight</p>
		<p style="font-size: 14px; color: #004080;font-weight:bold">{{$fromlocation->location_name}} to {{$tolocation->location_name}} </p>

		<p>Give us please as much information as possible about your upcoming trip (cell. phone number where we can reach you if available, hotel or place you will stay before your trip with us, flight numbers of international connection flights, so we can monitor if there are delays, etc.) </p>

		<p><strong>Cancellation Policy</strong> - Please note that we pay for the aircraft in full upon client booking confirmation.  We are able to offer a 50% refund for any cancellations within 7 days of the private flight.  There is no refund for cancellations within 3 days of the private flight. We offer a full refund for any cancellation more than 7 days before the private flight.</p>
	</div>
	<div class="col-md-4">

	</div>
</div>
</fieldset>

<div class="alert alert-danger form-errors" role="alert" style="display:none"></div>

<fieldset>
	<legend>Contact Information</legend>
<div class="form-group">
	<label class="control-label col-md-2"> Full Name <span>*</span></label>
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
	<legend>Requested Private Charter Flight</legend>
<div class="form-group">
	<label class="control-label col-md-2">From</label>
	<div class="col-md-7"> 
		{{$fromlocation->location_name}}
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">To</label>
	<div class="col-md-7"> 
		{{$tolocation->location_name}}
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Passengers</label>
	<div class="col-md-2"> 
	    <select name="passengers" id="passengers" class="form-control">
		@for($i = 1; $i <= $aircraft->maxpassengers; $i++)
			<option>{{$i}}</option>
		@endfor
		</select>
	</div>
	<div class="col-md-1 text-right"> 
		Infant(s)
	</div>
	<div class="col-md-2"> 
	    <select name="infants" id="infants" class="form-control">
	    <option value="0">0</option>
		@for($i = 1; $i <= 4; $i++)
			<option value="{{$i}}">{{$i}}</option>
		@endfor
		</select>
	</div>
	<div class="col-md-4">
		[ less than 2 years old (<24 months) - no seat ]
	</div>
</div>

<div class="form-group">
	<label class="control-label col-md-2">Date of flight</label>
	<div class="col-md-2"> 
		{!! Form::text('flight_date', null, ['class' => 'form-control arrival_date']) !!}
		@if ($errors->has('flight_date')) <p class="input-error">{{$errors->first('flight_date')}}</p> @endif
	</div>
</div>

<div class="form-group">
{!! Form::label('arrival_time', 'Flight Departure Time', ['class' => 'control-label col-md-2']) !!}
	<div class="col-md-2">
		<select name="flight_hour" id="arrival_hour" class="form-control">
			<option value="">HH</option>
		@for($i = 1; $i <= 12; $i++)
			@if ($i < 10)
				<option value="0{{$i}}">0{{$i}}</option>
			@else
				<option value="{{$i}}">{{$i}}</option>
			@endif
		@endfor
		</select>
	</div>

	<div class="col-md-2">
		<select name="flight_minutes" id="arrival_minutes" class="form-control">
		@for($i = 0; $i <= 59; $i++)
			@if ($i < 10)
				<option value="0{{$i}}">0{{$i}}</option>
			@else
				<option value="{{$i}}">{{$i}}</option>
			@endif
		@endfor
		</select>
	</div>

	<div class="col-md-2">
		<select name="flight_meridiam" id="arrival_meridiam" class="form-control">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	</div>
</div>

<!-- <div class="form-group">
	<label class="control-label col-md-2">Hotel Pick Up Time </label>
	<div class="col-md-7"> 
		<input name="hotel_pickup_time" readonly="readonly" id="hotel_pickedup"  value="00:00" style="border:none; width:80px">
		[ If no optional shuttle was chosen, please be 15 min before the desired flight departure time at the airport ]
	</div>
</div> -->
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
	<legend>Infant Information</legend>
<div id="infants_template" style="display:none">
	<div class="form-group">
		<div class="col-md-1 text-right">
			1
		</div>
		<div class="col-md-2">
			<input type="text" name="infant_firstname[]" class="form-control" placeholder="First Name">
		</div>
		<div class="col-md-2">
			<input type="text" name="infant_lastname[]" class="form-control" placeholder="Last Name">
		</div>
		<div class="col-md-2">
			<input type="text" name="infant_nationality[]" class="form-control" placeholder="Nationality">
		</div>
		<div class="col-md-2">
			<input type="text" name="infant_passport_number[]" class="form-control" placeholder="Passport #">
		</div>
	</div>
</div>
<div id="infants_wrapp">
	
</div>
</fieldset>

<div class="form-group">
	<div class="col-md-6 text-right"><a href="{{URL::to('charters')}}"><img src="{{URL::asset('img/back.jpg')}}" alt=""></a></div>
	<div class="col-md-6 text-left"><input type="image" id="Clk_submit_booking" value="Book now" src="{{URL::asset('img/submit.jpg')}}"></div>
</div> <br /><br /><br /><br /><br /><br /><br />

{!! Form::close() !!}
@endsection

@section('footer')
	<script src="{{URL::asset('/btdatepicker/js/bootstrap-datepicker.min.js')}}"></script>
	<script type="text/javascript">
	
	$(document).ready(function(){
		$('.arrival_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose : true,
        startDate: "-",
        clearBtn: true,
        todayHighlight: true
		});
	});

	function maxpassengers(){
		var passengerTemplate = $('#passengers_template').html();
		var maxp = parseInt($("#passengers option:selected").val());

		$('#passengers_wrapp').empty();
		for (var i = 1; i <= (maxp - 1); i++){
			$('#passengers_wrapp').append(passengerTemplate);
			$('#passengers_wrapp > div:last-child').find('.col-md-1').html((i + 1));
		}
	}

	function maxpassengersInfants(){
		var passengerTemplate = $('#infants_template').html();
		var maxp = parseInt($("#infants option:selected").val());

		$('#infants_wrapp').empty();
		for (var i = 1; i <= (maxp); i++){
			$('#infants_wrapp').append(passengerTemplate);
			$('#infants_wrapp > div:last-child').find('.col-md-1').html((i));
		}
	}

	$('#passengers').change(function(){
		maxpassengers();
	});

	$('#infants').change(function(){
		maxpassengersInfants();
	});

		
	/*
		function maxpassengers(){
			var passengerTemplate = $('#passengers_template').html();
			var maxp = parseInt($("#passengers option:selected").val());

			$('#passengers_wrapp').empty();
			for (var i = 1; i <= (maxp - 1); i++){
				$('#passengers_wrapp').append(passengerTemplate);
				$('#passengers_wrapp > div:last-child').find('.col-md-1').html((i + 1));
			}
		}

		$('#passengers').change(function(){
			maxpassengers();
		});

		function calculatePrice(){
			var price = _price;
			var priceAditionalShuttleFrom = parseFloat($("#aditional_shuttle_from option:selected").data('price'));
			var priceAditionalShuttleTo = parseFloat($("#aditional_shuttle_to option:selected").data('price'));
			var maxp = parseInt($("#CH_product_variation option:selected").data('maxpassengers'));

			var total = price ;

			var shuttlePayment = 0;
			if (priceAditionalShuttleFrom){
				total += priceAditionalShuttleFrom;
				shuttlePayment += priceAditionalShuttleFrom;
			}
			if (priceAditionalShuttleTo){
				total += priceAditionalShuttleTo;
				shuttlePayment += priceAditionalShuttleTo;
			}

			$('#sp_price').text(total.toFixed(2));
			$('#shuttle_payment').text(shuttlePayment.toFixed(2));
		}

		$('#aditional_shuttle_from').change(function(){
			var price = parseFloat($("#aditional_shuttle_from option:selected").data('price'));
			var duration = $("#aditional_shuttle_from option:selected").data('duration');
			var pickup = $("#aditional_shuttle_from option:selected").data('pickuptime');
			if (price){
				var priceT = parseFloat($("#aditional_shuttle_to option:selected").data('price'));
				if (priceT){
					//price += priceT;
				}
				$('#shuttle_price_from').text(price.toFixed(2));
			}
			if (duration){
				$('#shuttle_duration_from').text(duration);
			}
			if (pickup){
				$('#shuttle_pickuptime_from').text(pickup);
				$('#hotel_pickedup').val(pickup);
			}

			calculatePrice();
		});

		$('#aditional_shuttle_to').change(function(){
			var price = parseFloat($("#aditional_shuttle_to option:selected").data('price'));
			var duration = $("#aditional_shuttle_to option:selected").data('duration');
			var pickup = $("#aditional_shuttle_to option:selected").data('pickuptime');
			if (price){
				var priceF = parseFloat($("#aditional_shuttle_from option:selected").data('price'));
				if (priceF){
					//price += priceF;
				}
				$('#shuttle_price_to').text(price.toFixed(2));
			}
			if (duration)
				$('#shuttle_duration_to').text(duration);
			if (pickup){
				//$('#shuttle_pickuptime_to').text(pickup);
				$('#shuttle_pickuptime_to').text("Upon arrival");
			}

			calculatePrice();
		});

		$('#Clk_submit_booking').click(function(){
			$('#Clk_submit_booking').text('Sending...');
			$.ajax({
				url : site_url+'/charters/store',
				type : 'POST',
				data : $('#bookingForm').serialize(),
				dataType : 'json',
				success : function(data){	
					location.href = site_url+'/booking/confirm?bookingkey='+data.booking_key;
				},
				error : function(error){
					$("html, body").animate({"scrollTop": "0px"}, 500);
					$('#Clk_submit_booking').text('Book Now');

					$('.form-errors').fadeIn().html('');
					$('.form-errors').append('<ul>');
					$.each(error.responseJSON, function(index, value){
	                	$('.form-errors').append('<li>'+value+'</li>');
	                });

	                $('.form-errors').append('</ul>');
				}
			});
			return false;
		})
	})*/
	</script>
@endsection
