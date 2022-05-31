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
						<tr>
							<td width="200">Preferred language</td>
							<td>
								@if ($booking->language == 'es')
									Español
								@else
									English
								@endif
							</td>
						</tr>
						@if ($booking->from_place > 0)
						<tr>
							<td width="200">From Place</td>
							<td>{{$booking->fromplace->name}}</td>
						</tr>
						@endif
						@if ($booking->to_place > 0)
						<tr>
							<td width="200">To Place</td>
							<td>{{$booking->toplace->name}}</td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>

		{{-- Conditions --}}
		@if ($booking->service->fromlocation->is_airport and $booking->service->tolocation->is_airport)
						
		<div class="box box-solid box-default">
				<div class="box-header with-border">
					<h3 class="box-title">{{ $booking->type == 'roundtrip' ? __('1st Trip Arrival Information') : 'Arrival Information' }}</h3>
				</div>
	
				<div class="box-body">
					<table class="table">
						<tr>
							<td width="200">{{ __('Arrival date') }}</td>
							<td>{{$booking->arrival_date->format("Y-M-d")}}</td>
						</tr>
						<tr>
							<td width="200">{{ __('Arrival Airline') }}</td>
							<td>{{$booking->arrival_airline}}</td>
						</tr>
	
						<tr>
							<td width="200">{{ __('Flight number') }}</td>
							<td>{{$booking->flight_number}}</td>
						</tr>

						<tr>
							<td width="200">{{ __('Arrival time')}} </td>
							<td>{{ date('g:i A', strtotime($booking->arrival_time)) }}<td>
						</tr>
						<tr>
							<td width="200">Additional information</td>
							<td>{{$booking->more_information}}</td>
						</tr>
					</table>
				</div>
			</div>
	
		@elseif ($booking->service->fromlocation->is_airport)
			<div class="box box-solid box-default">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('Arrival Information') }}</h3>
				</div>
	
				<div class="box-body">
					<table class="table">
						<tr>
							<td width="200">{{ __('Arrival date') }}</td>
							<td>{{$booking->arrival_date->format("Y-M-d")}}</td>
						</tr>
	
						<tr>
							<td width="200">{{ __('Arrival Airline') }}</td>
							<td>{{$booking->arrival_airline}}</td>
						</tr>

						<tr>
							<td width="200">{{ __('Flight number') }}</td>
							<td>{{$booking->flight_number}}</td>
						</tr>

						<tr>
							<td width="200">{{ __('Arrival time')}} </td>
							<td>{{ date('g:i A', strtotime($booking->arrival_time)) }}<td>
						</tr>
						<tr>
							<td width="200">Additional information</td>
							<td>{{$booking->more_information}}</td>
						</tr>
					</table>
				</div>
			</div>
		@elseif ($booking->service->tolocation->is_airport)
		<div class="box box-solid box-default">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('Departure Information') }}</h3>
				</div>
	
				<div class="box-body">
					<table class="table">
						<tr>
							<td width="200">{{ __('Departure date') }}</td>
							<td>{{$booking->arrival_date->format("Y-M-d")}}</td>
						</tr>
						<tr>
							<td width="200">{{ __('Departure Airline') }}</td>
							<td>{{$booking->arrival_airline}}</td>
						</tr>
						<tr>
							<td width="200">{{ __('Flight Number') }}</td>
							<td>{{$booking->flight_number}}</td>
						</tr>
						<tr>
							<td width="200">{{ __('Departure time') }}</td>
							<td>{{ date('g:i A', strtotime($booking->arrival_time)) }}</td>
						</tr>
						<tr>
							<td width="200">I (we) want to arrive</td>
							<td>
									
								@if ($booking->want_to_arrive == 90)
									1 hour 30 min
								@elseif ($booking->want_to_arrive == 120)
									2 hours 00 min
								@elseif ($booking->want_to_arrive == 150)
									2 hours 30 min
								@elseif ($booking->want_to_arrive == 180)
									3 hours 00 min
								@elseif ($booking->want_to_arrive == 210)
									3 hours 30 min
								@endif
							</td>
						</tr>
						<tr>
							<td width="200">{{ __('Pick Up Time')}} </td>
							<td>{{ date('g:i A', strtotime($booking->pickup_time)) }}<td>
						</tr>
						<tr>
							<td width="200">Additional information</td>
							<td>{{$booking->more_information}}</td>
						</tr>
					</table>
				</div>
			</div>
		@else
		<div class="box box-solid box-default">
				<div class="box-header with-border">
					<h3 class="box-title">{{ $booking->type == 'roundtrip' ? __('1st Trip') : '' }} {{ __('Pick-up Information') }}</h3>
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

						<tr>
							<td width="200">{{ __('Pick-up Time')}}</td>
							<td>{{ date('g:i A', strtotime($booking->arrival_time)) }}</td>
						</tr>
						<tr>
							<td width="200">Additional information</td>
							<td>{{$booking->more_information}}</td>
						</tr>
					</table>
				</div>
			</div>
		@endif
		{{-- Arribal information --}}

		
		{{-- Deaperture information --}}
		@if ($booking->type == 'roundtrip')

			@if ($booking->service->fromlocation->is_airport and $booking->service->tolocation->is_airport)
			<div class="box box-solid box-default">
					<div class="box-header with-border">
						<h3 class="box-title">{{ __('2nd Trip Arrival Information')}} </h3>
					</div>
		
					<div class="box-body">
						<table class="table">
							<tr>
								<td>{{ __('2nd Trip Arrival Date')}}</td>				
								<td>{{$booking->return_date->format("Y-M-d")}}</td>
							</tr>
							
							<tr>
								<td width="200">{{ __('2nd Trip Arrival Airline')}}</td>
								<td>{{$booking->return_airline}}</td>
							</tr>

							<tr>
								<td width="200">{{ __('2nd Trip Flight Number')}}</td>
								<td>{{$booking->return_flight_number}}</td>
							</tr>
						
							<tr>
								<td width="200">{{ __('2nd Trip Arrival Time')}}</td>
								<td>{{ date('g:i A', strtotime($booking->return_time_2)) }}</td>
							</tr>
						
							<tr>
								<td width="200">Additional Information</td>
								<td>{{$booking->return_more_information}}</td>
							</tr>
						</table>
					</div>
				</div>
			@elseif ($booking->service->fromlocation->is_airport)
			<div class="box box-solid box-default">
					<div class="box-header with-border">
						<h3 class="box-title">{{ __('Departure Information') }}</h3>
					</div>
		
					<div class="box-body">
						<table class="table">
							<tr>
								<td width="200">{{ __('Departure date') }}</td>
								<td>{{$booking->return_date->format("Y-M-d")}}</td>
							</tr>
							<tr>
								<td width="200">{{ __('Departure Airline') }}</td>
								<td>{{$booking->return_airline}}</td>
							</tr>
							<tr>
								<td width="200">{{ __('Flight Number')}}</td>
								<td>{{$booking->return_flight_number}}</td>
							</tr>
							<tr>
								<td width="200">{{ __('Departure time') }}</td>
								<td>{{ date('g:i A', strtotime($booking->return_time_2)) }}</td>
							</tr>
							<tr>
								<td width="200">I (we) want to arrive</td>
								<td>
										
									@if ($booking->return_want_to_arrive_2 == 90)
										1 hour 30 min
									@elseif ($booking->return_want_to_arrive_2 == 120)
										2 hours 00 min
									@elseif ($booking->return_want_to_arrive_2 == 150)
										2 hours 30 min
									@elseif ($booking->return_want_to_arrive_2 == 180)
										3 hours 00 min
									@elseif ($booking->return_want_to_arrive_2 == 210)
										3 hours 30 min
									@endif
								</td>
							</tr>
							<tr>
								<td width="200">{{ __('Pick Up Time')}} </td>
								<td>{{ date('g:i A', strtotime($booking->return_pickup_time_2)) }}<td>
							</tr>
							<tr>
								<td width="200">Additional information</td>
								<td>{{$booking->return_more_information}}</td>
							</tr>
						</table>
					</div>
				</div>
			@elseif ($booking->service->tolocation->is_airport)
				<div class="box box-solid box-default">
					<div class="box-header with-border">
						<h3 class="box-title">{{ __('Arrival information')}} </h3>
					</div>
		
					<div class="box-body">
						<table class="table">
							<tr>
								<td>{{ __('Arrival date')}}</td>
								<td>{{$booking->return_date->format("Y-M-d")}}</td>
							</tr>
							
							<tr>
								<td width="200">{{ __('Arrival Airline') }}</td>
								<td>{{$booking->return_airline}}</td>
							</tr>
							<tr>
								<td width="200">{{ __('Flight Number')}}</td>
								<td>{{$booking->return_flight_number}}</td>
							</tr>
							<tr>
								<td width="200">{{ __('Arrival time')}} </td>
								<td>{{ date('g:i A', strtotime($booking->return_time_2)) }}</td>
							</tr>
							
							<tr>
								<td width="200">Additional Information</td>
								<td>{{$booking->return_more_information}}</td>
							</tr>
						</table>
					</div>
				</div>
			@else
			<div class="box box-solid box-default">
					<div class="box-header with-border">
						<h3 class="box-title">{{ __('2nd Trip Pick-up Information')}} </h3>
					</div>
		
					<div class="box-body">
						<table class="table">
							<tr>
								<td>{{ __('Return date')}}</td>
								<td>{{$booking->return_date->format("Y-M-d")}}</td>
							</tr>
							<tr>
								<td width="200">{{ __('Return time')}}</td>
								<td>{{ date('g:i A', strtotime($booking->return_time_2)) }}</td>
							</tr>
						
							<tr>
								<td width="200">Additional Information</td>
								<td>{{$booking->return_more_information}}</td>
							</tr>
						</table>
					</div>
				</div>
			@endif
		
		@endif
	</div>
	{{-- end col --}}

	<div class="col-md-6">
		<div class="box box-solid box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">{{ __('Service') }} ({{ $booking->type == 'roundtrip' ? 'Round Trip' : 'One Way'}})</h3>
			</div>

			<div class="box-body">
			 
				From <strong>{{$booking->alias_location_from}}</strong> to <strong>{{$booking->alias_location_to}}</strong>
					<table class="table">
					
							<tbody>
									{{-- <tr>
											<td width="200">From</td>
											<td>{{$booking->alias_location_from}}</td>
										</tr>
									
										<tr>
											<td width="200">To</td>
											<td>{{$booking->alias_location_to}}</td>
										</td> --}}
									
										<tr>
											<td width="200">Vehicle Size</td>
											<td>{{$booking->servicePrice->priceOption->name}}</td>
										</td>
									
										{{-- <tr>
											<td width="200">Passengers</td>
											<td>{{$booking->passengers}}</td>
										</td> --}}
									
										<tr>
											<td width="200">Child Seats</td>
											<td><strong>{{$booking->child_seat}}</strong> up to <strong>12</strong> months 
												<strong>{{$booking->child_seat_1year}}</strong> over <strong>1</strong> year old</td>
										</td>
									
										{{-- <tr>
											<td width="200">Fare U$</td>
											<td>{{number_format($priceCalculation->price, 2, '.', ',')}}</td>
										</td> --}}
									
										{{-- <tr>
											<td width="200">Extra Payment</td>
											<td>{{number_format($priceCalculation->extraPayment, 2, '.', ',')}}</td>
										</td>
									
										<tr>
											<td width="200">Catering U$</td>
											<td>{{number_format($priceCalculation->catering, 2, '.', ',')}}</td>
										</td> --}}
									
										
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

@section('footer')
	<script>
		function submitForm(this1)
			{
			//alert('asdasd');
			this1.disabled=true; 
			this1.innerHTML='<i class="fa fa-spinner fa-spin"></i> Please wait…';
			this1.form.submit();
			}
	</script>  
@endsection