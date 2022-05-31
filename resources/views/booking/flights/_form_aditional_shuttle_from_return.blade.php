@if ( !$shuttles->isEmpty() )
<div class="form-group">
	<label class="col-md-7 control-label">Shuttle from {{$service->from_name}}</label>
	<div class="clearfix"></div>
	<div class="col-md-8">
	@php 
		$direction = $way == 'roundtrip' ? 'To' : 'From';
	@endphp
	<select name="aditional_shuttle_from_return" id="aditional_shuttle_from_return" class="form-control">

		<option value="">-No thanks - I (we) don’t need Optional Shuttle Service to the Airport </option>
		@foreach($shuttles as $hotel)
			@if (!empty($hotel->hotel))
				<option value="{{$hotel->id}}" data-duration="{{$hotel->note}}" data-price="{{$hotel->price}}" data-pickuptime="{{$hotel->pickup_time}}">{{$direction}} {{$hotel->hotel}}</option>
			@endif
		@endforeach
	</select>
	</div>

	<div class="clearfix"></div>
	{!! Form::label('', 'Pick Up Time', ['class' => 'control-label col-md-2']) !!}
	<label class="col-md-7 control-label" id="shuttle_pickuptime_from_return"></label>

	<div class="clearfix"></div>
	{!! Form::label('', 'Shuttle Duration', ['class' => 'control-label col-md-2']) !!}
	<label class="col-md-7 control-label" id="shuttle_duration_from_return"></label>

	<div class="clearfix"></div>
	{!! Form::label('', 'Shuttle Fare U$', ['class' => 'control-label col-md-2']) !!}
	<label class="col-md-1 control-label" id="shuttle_price_from_return"></label>
	<label class="col-md-6 control-label">[ One time fee for up to 7 passengers ]</label>

	<div class="clearfix"></div><br />
	{!! Form::label('', 'Hotel or Location to be dropped off', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-8">
		{!! Form::textarea('hotel_to_be_pickup_from_return', null, ['rows' => 4, 'class' => 'form-control']) !!}
	</div>

	<div class="clearfix"></div><br />
	{!! Form::label('', 'If an International Arrival Flight is involved at the Departure Airport please let us know with which Airline, Flightnumber and at what time you will arrive', ['class' => 'control-label col-md-4']) !!}
	<div class="col-md-8">
		{!! Form::textarea('international_arrival_from_return', null, ['rows' => 4, 'class' => 'form-control']) !!}
	</div>
</div>
@endif
