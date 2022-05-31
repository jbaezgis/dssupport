<div class="confirmation-panel">

<fieldset>
	<legend>Your Contact Information</legend>
<table class="table">
	<tr>
		<td width="200">Order #</td>
		<td>{{$booking->id}}</td>
	</tr>
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
	<legend>Shuttle Info</legend>
<table class="table">
	<tr>
		<td width="200">Passengers</td>
		<td>{{$booking->passengers}}</td>
	</tr>
	<tr>
		<td width="200">Trip Info</td>
		@if ($booking->hasMeta('hotel_name'))
		<td>Shuttle and Ferry combination from  {{$booking->getMeta('hotel_name')}} to {{$booking->service->tolocation->location_name}}</td>
		@endif
	</tr>
	<tr>
		<td width="200">Fare</td>
		<td>{{number_format($booking->fair, 2,'.',',')}}</td>
	</tr>
	<tr>
		<td width="200">Total Fare</td>
		<td>{{number_format($booking->order_total, 2,'.',',')}}</td>
	</tr>
	@if ($booking->hasMeta('interested_overnight'))
	<tr>
		<td width="200">I am interested in an Overnight Option in Punta Cana the day of my arrival</td>
		<td>{{$booking->getMeta('interested_overnight')}}</td>
	</tr>
	@endif

	@if ($booking->hasMeta('shuttle_destionation'))
	<tr>
		<td width="200">Shuttle from Pier Samana to your Destination</td>
		<td>{{$booking->getMeta('shuttle_destionation')}}</td>
	</tr>
	@endif

	@if ($booking->hasMeta('excursion'))
	<tr>
		<td width="200">I am interested in an Excursion to Los Haitises and/or an Overnight Option at "Paraiso Ca&ntilde;o Hondo"</td>
		<td>{{$booking->getMeta('excursion')}}</td>
	</tr>
	@endif

	<tr>
		<td width="200">Date of booking</td>
		<td>{{$booking->arrival_date->format("Y-M-d")}}</td>
	</tr>

	<tr>
		<td width="200">From Information</td>
		<td>{{$booking->getMeta('from_information')}}</td>
	</tr>

	<tr>
		<td width="200">To Information</td>
		<td>{{$booking->getMeta('to_information')}}</td>
	</tr>
</table>
</fieldset>
</div>