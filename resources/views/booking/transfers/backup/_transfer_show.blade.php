<div class="row">
	<div class="col-md-6">
		<div class="box box-solid box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Your Contact Information</h3>
			</div>

			<div class="box-body">
				<table class="table table-striped">
					
					<tbody>
							<tr>
									<td width="200">Order #</td>
									<td>{{$booking->id}}</td>
								</tr>
								<tr>
									<td width="200">Full Name</td>
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
								
								{{-- <tr>
									<td width="200">Phone DR</td>
									<td>{{$booking->phone_dr}}</td>
								</tr>
							
								<tr>
									<td width="200">Nationality</td>
									<td>{{$booking->nationality}}</td>
								</tr> --}}
					</tbody>
				</table>
			</div>
		</div>

		{{-- Arribal information --}}

		<div class="box box-solid box-default">
			<div class="box-header with-border">
				<h3 class="box-title">{{$booking->service->fromlocation->is_airport ? 'Arrival Information' : 'Departure Information'}} </h3>
			</div>

			<div class="box-body">
				<table class="table">
					<tr>
						@if ($booking->service->fromlocation->is_airport || $booking->service->tolocation->is_airport)
							<td width="200">{{$booking->service->fromlocation->is_airport ? 'Arrival Date' : 'Departure Date'}}</td>
						@else
							<td width="200">Travel Date</td>
						@endif
						<td>{{$booking->arrival_date->format("Y-M-d")}}</td>
					</tr>

					@if ($booking->service->fromlocation->is_airport || $booking->service->tolocation->is_airport)
					<tr>
						<td width="200">{{$booking->service->fromlocation->is_airport ? 'Arrival Airline' : 'Departure Airline'}}</td>
						<td>{{$booking->getMeta('arrival_airline')}}</td>
					</tr>

					<tr>
						<td width="200">Flight Number</td>
						<td>{{$booking->getMeta('flight_number')}}</td>
					</tr>
					@endif
				</table>
			</div>
		</div>

		{{-- Deaperture information --}}
		@if ($booking->type == 'roundtrip')
		<div class="box box-solid box-default">
			<div class="box-header with-border">
				<h3 class="box-title">
					@if ($booking->service->tolocation->is_airport || $booking->service->fromlocation->is_airport)
						{{$booking->service->tolocation->is_airport && !$booking->service->fromlocation->is_airport ? 'Arrival Information' : 'Departure Information'}}
					@else
						Return Travel Information
					@endif
				</h3>
			</div>

			<div class="box-body">
				<table class="table">
					<tr>
						@if ($booking->service->tolocation->is_airport || $booking->service->fromlocation->is_airport)
							<td width="200">{{$booking->service->tolocation->is_airport && !$booking->service->fromlocation->is_airport ? 'Arrival Date' : 'Departure Date'}}</td>
						@else
							<td>Return date</td>
						@endif
				
						<td>{{$booking->return_date->format("Y-M-d")}}</td>
					</tr>
					
					@if ($booking->service->fromlocation->is_airport || $booking->service->tolocation->is_airport)
					<tr>
						<td width="200">{{$booking->service->tolocation->is_airport && !$booking->service->fromlocation->is_airport ? 'Arrival Airline' : 'Departure Airline'}}</td>
						<td>{{$booking->getMeta('return_airline')}}</td>
					</tr>
				
					<tr>
						<td width="200">Flight Number</td>
						<td>{{$booking->getMeta('return_flight_number')}}</td>
					</tr>
				
					<tr>
						<td width="200">{{$booking->service->tolocation->is_airport && !$booking->service->fromlocation->is_airport ? 'Arrival Time' : 'Departure Time'}}</td>
						<td>{{$booking->return_time}}</td>
					</tr>
					
					@if ($booking->getMeta('return_want_to_arrive') != "")
						<tr>
							<td width="200">I (we) want to arrive</td>
							<td>{{$booking->getMeta('return_want_to_arrive')}}</td>
						</tr>
					@endif
				
					<tr>
						<td width="200">Pick Up Time</td>
						<td>{{strtoupper($booking->getMeta('return_pickup_time'))}}</td>
					</tr>
					
					<tr>
						<td width="200">Pick me (us) up at</td>
						<td>{{ strtoupper($booking->getMeta('return_pickup_time')) }}</td>
					</tr>
				
					@else
					<tr>
						<td width="200">Pick Up Time</td>
						<td>{{strtoupper($booking->getMeta('return_pickup_time'))}}</td>
					</tr>
					@endif
				
					<tr>
						<td width="200">From Information</td>
						<td>{{$booking->getMeta('return_from_information')}}</td>
					</tr>
				
					<tr>
						<td width="200">To Information</td>
						<td>{{$booking->getMeta('return_to_information')}}</td>
					</tr>
				</table>
			</div>
		</div>
		@endif
	</div>
	{{-- end col --}}

	<div class="col-md-6">
		<div class="box box-solid ">
			{{-- <div class="box-header with-border">
				<h3 class="box-title">Your Contact Information</h3>
			</div> --}}

			<div class="box-body">
				Service: <br/>
				From <strong>{{$booking->alias_location_from}}</strong> to <strong>{{$booking->alias_location_to}}</strong>
					<table class="table">
					
							<tbody>
									<tr>
											<td width="200">From</td>
											<td>{{$booking->alias_location_from}}</td>
										</tr>
									
										<tr>
											<td width="200">To</td>
											<td>{{$booking->alias_location_to}}</td>
										</td>
									
										<tr>
											<td width="200">Vehicle Size</td>
											<td>{{$booking->servicePrice->priceOption->name}}</td>
										</td>
									
										<tr>
											<td width="200">Passengers</td>
											<td>{{$booking->passengers}}</td>
										</td>
									
										<tr>
											<td width="200">Child Seats</td>
											<td><strong>{{$booking->child_seat}}</strong> up to 12 months 
												{{$booking->child_seat_1year}}</strong> over 1 year old</td>
										</td>
									
										<tr>
											<td width="200">Fare U$</td>
											<td>{{number_format($priceCalculation->price, 2, '.', ',')}}</td>
										</td>
									
										<tr>
											<td width="200">Extra Payment</td>
											<td>{{number_format($priceCalculation->extraPayment, 2, '.', ',')}}</td>
										</td>
									
										<tr>
											<td width="200">Catering U$</td>
											<td>{{number_format($priceCalculation->catering, 2, '.', ',')}}</td>
										</td>
									
										
							</tbody>
						</table>
			</div>
			{{-- end box-body --}}
			<div class="box-footer bg-default">
				<h4>Total Fare U$: {{number_format($priceCalculation->totalFair, 2, '.', ',')}}</h4>
			</div>
		</div>
		
	</div>
</div>

{{-- <div class="confirmation-panel">


@if ($booking->type == 'roundtrip')
<fieldset>
	@if ($booking->service->tolocation->is_airport || $booking->service->fromlocation->is_airport)
		<legend>{{$booking->service->tolocation->is_airport && !$booking->service->fromlocation->is_airport ? 'Arrival Information' : 'Departure Information'}} </legend>
	@else
		<legend>Return Travel Information</legend>
	@endif



</fieldset>
@endif

</div> --}}