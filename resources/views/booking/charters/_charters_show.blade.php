<div class="confirmation-panel">
<table class="table">
	<tr>
		<td width="200"><strong>Order Number</strong></td>
		<td>{{$booking->id}}</td>
	</div>
</table>

<fieldset>
	<legend>Your Contact Information</legend>
<table class="table">
	<tr>
		<td width="200">Name</td>
		<td>{{$booking->fullname}}</td>
	</tr>
	<tr>
		<td width="200">Email</td>
		<td>{{$booking->email}}</td>
	</tr>

	<tr>
		<td width="200">Phone</td>
		<td>{{$booking->phone}}</td>
	</tr>

	<tr>
		<td width="200">Phone DR</td>
		<td>{{$booking->phone_dr}}</td>
	</tr>
</table>
</fieldset>

<fieldset>
	<legend>Requested Service</legend>
	<table class="table">
	<tr>
		<td width="200">From</td>
		<td>{{$booking->fromlocation->location_name}}</td>
	</tr>
	<tr>
		<td width="200">To</td>
		<td>{{$booking->tolocation->location_name}}</td>
	</tr>
	<tr>
		<td width="200">AirCraft</td>
		<td>{{$booking->aircraft->name}}</td>
	</tr>
	<tr>
		<td width="200">Passengers</td>
		<td>{{$booking->passengers}}</td>
	</tr>
	<tr>
		<td width="200">Infant</td>
		<td>{{$booking->infants}} [ less than 2 years old (<24 months) - no seat ]</td>
	</tr>
	<tr>
		<td width="200">Flight Departure Time </td>
		<td>{{$booking->flight_date}}</td>
	</tr>
	<tr>
		<td width="200">Flight Arrival Time </td>
		<td>{{$booking->flight_departure_time}}</td>
	</tr>
	</table>
</fieldset>

<fieldset>
	<legend>Passenger Information</legend>
	<table class="table table-condensed">
		<tr>
			<th>#</th>
			<th>Names</th>
			<th>Nationality</th>
			<th>Passport</th>
		</tr>
	<?php $i = 1; foreach ($booking->passengers()->where('passenger_type', 'passenger')->get() as $passenger):?>
		<tr>
			<td>Passenger {{$i}}</td>
			<td>{{$passenger->first_name}} {{$passenger->last_name}}</td>
			<td>{{$passenger->nationality}}</td>
			<td>{{$passenger->passport}}</td>
		</tr>
	<?php $i++; endforeach;?>
	</table>
</fieldset>

@if($booking->passengers()->where('passenger_type', 'infant')->count() > 0)
<fieldset>
	<legend>Infants Information</legend>
	<table class="table table-condensed">
		<tr>
			<th>#</th>
			<th>Names</th>
			<th>Nationality</th>
			<th>Passport</th>
		</tr>
	<?php $i = 1; foreach ($booking->passengers()->where('passenger_type', 'infant')->get() as $passenger):?>
		<tr>
			<td>Passenger {{$i}}</td>
			<td>{{$passenger->first_name}} {{$passenger->last_name}}</td>
			<td>{{$passenger->nationality}}</td>
			<td>{{$passenger->passport}}</td>
		</tr>
	<?php $i++; endforeach;?>
	</table>
</fieldset>
@endif

</div>

