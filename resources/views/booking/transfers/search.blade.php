@extends('app', ['menu' => 'groundtransfer', 'title' => "Dominican Shuttles fair price are for private, very reliable service."])

@section('content')
	<table class="table search-table">
	@if (count($results) > 0)
		<tr>
			<th>Private Transfer <span class="hidden-xs"> between the following locations</span></th>
			<th class="text-center">Driving Time</th>
			<th class="text-center" style="width:15%">One-Way<br />U$</th>
			<th class="text-center" style="width:15%">Round-Trip<br /> U$</th>
		</tr>
		<tr>
			<td></td>
		</tr> 
		@foreach($results as $result)
		<tr>
			<td style="vertical-align:middle" class="search_location"><h5>From
				{{ $fromString }} to {{$toString}}
			 </h5></td>
			<td style="vertical-align:middle"><h5 style="font-weight:bold">{{formatDrivingTime($result->driving_time)}}</h5></td>
			<td class="text-center">
				<h5 style="font-weight:bold">${{number_format($result->prices->first()->oneway_price,2,'.',',')}}</h5>
				<a class="btn btn-success" href="{{url('request-ground-transfer-service?service='.$result->id.'&way=oneway&aFrom='.$aliasFromID.'&aTo='.$aliasToID)}}">Book Now!</a>
			</td>
			<td class="text-center">
				<h5 style="font-weight:bold">${{number_format($result->prices->first()->roundtrip_price,2,'.',',')}}</h5>
				<a class="btn btn-success" href="{{url('request-ground-transfer-service?service='.$result->id.'&way=roundtrip&aFrom='.$aliasFromID.'&aTo='.$aliasToID)}}">Book Now!</a>
			</td>
		</tr>
		
		<tr>
			<td colspan="4">
				<!--<img class="img-responsive" src="{{URL::asset('maps/'.$result->mapimage)}}">-->
				<br />
				
				<?php
				//$replace = array("(", ")");
				//$fromString = str_replace($replace, "", $fromString);
				
				$parts = explode("(", $fromString);
				$fromString = $parts[0].', Dominican Republic';
				
				$parts = explode("(", $toString);
				$toString = $parts[0].', Dominican Republic';
				?>
			<iframe
				  width="100%"
				  height="450"
				  frameborder="0" style="border:0"
				  src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDGkozgjrmFAlSKsmNBkIu_iOeOKAEN9_g&origin={{$fromString}}&destination={{$toString}}" allowfullscreen>
				  </iframe>
			</td>
		</tr>
		<!--<br>
		<div class="row">
			<div class="col-md-12">
				<h4>From {{ $fromString }} to {{$toString}}</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5 style="font-weight:bold">{{formatDrivingTime($result->driving_time)}}</h5>
			</div>
			<div class="col-md-4">
				<h5 style="font-weight:bold">${{number_format($result->prices->first()->oneway_price,2,'.',',')}}</h5>
				<a class="btn btn-success" href="{{url('request-ground-transfer-service?service='.$result->id.'&way=oneway&aFrom='.$aliasFromID.'&aTo='.$aliasToID)}}">Book Now!</a>
			</div>
			<div class="col-md-4">
				<h5 style="font-weight:bold">${{number_format($result->prices->first()->roundtrip_price,2,'.',',')}}</h5>
				<a class="btn btn-success" href="{{url('request-ground-transfer-service?service='.$result->id.'&way=roundtrip&aFrom='.$aliasFromID.'&aTo='.$aliasToID)}}">Book Now!</a>
			</div>
		</div>-->

		
		@endforeach
	@else

	@endif
	</table>


@endsection