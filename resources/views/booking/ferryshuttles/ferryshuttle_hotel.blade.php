@extends('layouts.app', ['title' => 'Ferry & Shuttle Combinations'])

@section('content')
<h1 class="title">Ferry & Shuttle Combinations</h1>

<table class="table search-table">
	<tr>
		@if ($service->fromlocation->location_name == 'Samana')
			<th>Select Location where you are staying</th>
		@else
			<th>Select Hotel where you are staying</th>
		@endif
		<th class="text-center">Pick up Time (daily)</th>
		<th class="text-center">Fare: U$ {{number_format($service->price_first_person, 2,'.',',')}} (first person), U$ {{number_format($service->price_aditional_person, 2,'.',',')}} <br />(each additional person) 
		@if ($service->fromlocation->location_name == 'Samana')
			+ Shuttle to Pier Samana
		@endif
		</th>
	</tr>
	@foreach($service->ferryHotels()->get() as $hotel)
	<tr>
		<td><strong>{{$hotel->hotel}} {{$hotel->note}}</strong></td>
		<td class="text-center">{{$hotel->pickup_time}}</td>
		<td class="text-center"><a href="{{URL::to('ferryshuttle/request?service_id='.$service->id.'&hotel='.$hotel->id)}}"><img src="{{URL::asset('img/btn-book-now.png')}}"></a></td>
	</tr>
	@endforeach
</table>

@endsection