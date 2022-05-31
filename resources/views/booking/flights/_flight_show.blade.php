<div class="confirmation-panel">
<fieldset>
	<legend>Your Contact Information</legend>
<table class="table">
	<tr>
		<td width="200">Order #</td>
		<td>{{$booking->id}}</td>
	</tr>
	<tr>
		<td width="200">Type</td>
		<td>{{$booking->type}}</td>
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
	<legend>Requested Onward Flight</legend>
<table class="table">
	<tr>
		<td width="200">From</td>
		<td>{{$booking->service->fromlocation->location_name}}</td>
	</tr>
	<tr>
		<td width="200">To</td>
		<td>{{$booking->service->tolocation->location_name}}</td>
	</tr>
	<tr>
		<td width="200">Passengers</td>
		<td>{{$booking->passengers}}</td>
	</tr>
	<tr>
		<td width="200">Infant</td>
		<td>{{$booking->child_seat}} [ less than 2 years old (<24 months) - no seat ]</td>
	</tr>
	<tr>
		<td width="200">Fare per person</td>
		<td>{{number_format($booking->fair, 2, '.', ',')}} </td>
	</tr>
	<tr>
		<td width="200">Fare per infant</td>
		<td>{{number_format($booking->service->price_per_children,2,'.',',')}}</td>
	</tr>
	<tr>
		<td width="200">Shuttle Payment U$ </td>
		<td>{{number_format($priceCalculation->shuttlePayment,2,'.',',')}}</td>
	</tr>
	<tr>
		<td width="200">Total Onward Fare U$ </td>
		<td>{{number_format($priceCalculation->totalShuttle + $priceCalculation->shuttlePayment,2,'.',',')}}</td>
	</tr>
	<tr>
		<td width="200">Flight Departure Time </td>
		<td>{{$booking->service->driving_time}}</td>
	</tr>
    <tr>
        <td width="200">Flight Date </td>
        <td>{{$booking->arrival_date->format("Y-M-d")}}</td>
    </tr>
	<tr>
		<td width="200">Flight Arrival Time </td>
		<td>{{$booking->service->arrival_time}}</td>
	</tr>
	@if ($booking->metas->where('meta_name', 'hotel_pickup_time')->first())
	<tr>
		<td width="200">Hotel Pick Up Time  </td>
		<td>{{$booking->getMeta('hotel_pickup_time')}}</td>
	</tr>
	@endif
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
	<?php $i = 1; foreach ($booking->passengers()->get() as $passenger):?>
		<tr>
			<td>Passenger {{$i}}</td>
			<td>{{$passenger->first_name}} {{$passenger->last_name}}</td>
			<td>{{$passenger->nationality}}</td>
			<td>{{$passenger->passport}}</td>
		</tr>
	<?php $i++; endforeach;?>
	</table>
</fieldset>

@if ($shuttleInfo || $shuttleInfoTo)
<fieldset>
	<legend>Your Optional Airport Shuttle Service & Other Information(One-Way)</legend>
<table class="table">
	@if ($shuttleInfo)
	<tr>
		<td width="200">Shuttle To {{$booking->service->fromlocation->location_name}} </td>
		<td>From {{$shuttleInfo->hotel}} - Pick up Time - {{$shuttleInfo->pickup_time}} - US${{number_format($shuttleInfo->price, 2, '.', ',')}}</td>
	</tr>
	<tr>
		<td width="200">Hotel or Location to be picked up</td>
		<td>{{$booking->getMeta('hotel_to_be_pickup_from')}}</td>
	</tr>
	<tr>
		<td width="200">If an International Departure Flight is involved at the Arrival Airport please let us know with which Airline, Flightnumber and at what time you will depart  </td>
		<td>{{$booking->getMeta('international_arrival_from')}}</td>
	</tr>
	@endif

	@if ($shuttleInfoTo)
	<tr>
		<td width="200">Shuttle From {{$booking->service->tolocation->location_name}} </td>
		<td>To {{$shuttleInfoTo->hotel}} - Pick up Time - {{$shuttleInfoTo->pickup_time}} - US${{number_format($shuttleInfoTo->price, 2, '.', ',')}}</td>
	</tr>
	<tr>
		<td width="200">Hotel or Location to be picked up</td>
		<td>{{$booking->getMeta('hotel_to_be_pickup_to')}}</td>
	</tr>
	<tr>
		<td width="200">If an International Departure Flight is involved at the Arrival Airport please let us know with which Airline, Flightnumber and at what time you will depart  </td>
		<td>{{$booking->getMeta('international_arrival_to')}}</td>
	</tr>
	@endif
</table>
</fieldset>
@endif

@if ($booking->type == 'roundtrip')
<fieldset>
	<legend>Requested Return Flight</legend>
<table class="table">
	<tr>
		<td width="200">From</td>
		<td>{{$booking->service->tolocation->location_name}}</td>
	</tr>

	<tr>
		<td width="200">To</td>
		<td>{{$booking->service->fromlocation->location_name}}</td>
	</tr>

	<tr>
		<td width="200">Fare per person</td>
		<td>{{number_format($booking->fair, 2, '.', ',')}} </td>
	</tr>
	<tr>
		<td width="200">Fare per infant</td>
		<td>0.00</td>
	</tr>
	<tr>
		<td width="200">Shuttle Payment U$ </td>
		<td>{{$priceCalculation->shuttlePaymentReturn}}</td>
	</tr>
	<tr>
		<td width="200">Total Return Fare U$ </td>
		<td>{{($priceCalculation->totalShuttle + $priceCalculation->shuttlePaymentReturn)}}</td>
	</tr>
	<tr>
		<td width="200">Total Round-Trip Fare U$ </td>
		<td>{{number_format($priceCalculation->totalFair,2,'.',',')}}</td>
	</tr>
	<tr>
		<td width="200">Flight Departure Time </td>
		<td>{{$booking->service->departure_time_return}}</td>
	</tr>
	<tr>
		<td width="200">Flight Arrival Time </td>
		<td>{{$booking->service->arrival_time_return}}</td>
	</tr>
	@if ($booking->metas->where('meta_name', 'hotel_pickup_time_return')->first())
	<tr>
		<td width="200">Hotel Pick Up Time  </td>
		<td>{{$booking->getMeta('hotel_pickup_time_return')}}</td>
	</tr>
	@endif
</table>
</fieldset>

@if ($shuttleInfoReturn || $shuttleInfoToReturn):
<fieldset>
	<legend>Your Optional Airport Shuttle Service & Other Information(Return-Trip)</legend>
<table class="table">
	@if ($shuttleInfoToReturn)
	<tr>
		<td width="200">Shuttle To {{$booking->service->tolocation->location_name}} </td>
		<td>From {{$shuttleInfoToReturn->hotel}} - Pick up Time - {{$shuttleInfoToReturn->pickup_time}} - US${{number_format($shuttleInfoToReturn->price, 2, '.', ',')}}</td>
	</tr>
	<tr>
		<td width="200">Hotel or Location to be picked up</td>
		<td>{{$booking->getMeta('hotel_to_be_pickup_to_return')}}</td>
	</tr>
	<tr>
		<td width="200">If an International Departure Flight is involved at the Arrival Airport please let us know with which Airline, Flightnumber and at what time you will depart  </td>
		<td>{{$booking->getMeta('international_arrival_to_return')}}</td>
	</tr>
	@endif

	@if ($shuttleInfoReturn)
	<tr>
		<td width="200">Shuttle From {{$booking->service->fromlocation->location_name}} </td>
		<td>To {{$shuttleInfoReturn->hotel}} - Pick up Time - {{$shuttleInfoReturn->pickup_time}} - US${{number_format($shuttleInfoReturn->price, 2, '.', ',')}}</td>
	</tr>
	<tr>
		<td width="200">Hotel or Location to be picked up</td>
		<td>{{$booking->getMeta('hotel_to_be_pickup_from_return')}}</td>
	</tr>
	<tr>
		<td width="200">If an International Departure Flight is involved at the Arrival Airport please let us know with which Airline, Flightnumber and at what time you will depart  </td>
		<td>{{$booking->getMeta('international_arrival_from_return')}}</td>
	</tr>
	@endif
</table>
</fieldset>
@endif

@endif

</div>
