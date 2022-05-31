@extends('app', ['menu' => 'scheduledflight', 'title' => "Flight $result->from_name to $result->to_name"])

@section('content')
	<table class="table search-table">
	@if (count($results) > 0)
		<tr>
			<th>Regular Flight(s) Between The Following Airports</th>
			<th class="text-center">Departure time</th>
			<th class="text-center">Arrival time</th>
			<th class="text-center" style="width:15%">One-Way<br />U$</th>
			<th class="text-center" style="width:15%">Round-Trip<br /> U$</th>
		</tr>
		@foreach($results as $result)
		<tr>
			<td style="vertical-align:middle" class="search_location"><h5>From {{$result->from_name}} to {{$result->to_name}}</h5></td>
			<td class="text-center" style="vertical-align:middle;width:100px"><h5>{{$result->driving_time}}</h5></td>
			<td class="text-center" style="vertical-align:middle;width:100px"><h5>{{$result->arrival_time}}</h5></td>
			<td class="text-center">
				<h5 style="font-weight:bold">{{number_format($result->prices->first()->oneway_price, 2, '.', ',')}}</h5>
				<a class="btn btn-success" href="{{url('request-flight-service?service='.$result->id.'&way=oneway')}}">Book Now!</a>
			</td>
			<td class="text-center">
				<h5 style="font-weight:bold">{{number_format($result->prices->first()->roundtrip_price * 2, 2, '.', ',')}}</h5>
				<a class="btn btn-success" href="{{url('request-flight-service?service='.$result->id.'&way=roundtrip')}}">Book Now!</a>
			</td>
		</tr>

		@endforeach

		@foreach($results as $result)
			@if($result->mapimage && count($result) == 1)
			<tr>
				<td colspan="5"><br />
					<img class="img-responsive" src="{{URL::asset('maps/'.$result->mapimage)}}">
				</td>
			</tr>
			@endif
		@endforeach
	@else

	@endif
	</table>
@endsection
