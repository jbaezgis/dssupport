@extends('layouts.app', ['menu' => 'charters', 'hidesidebar' => true, 'title' => 'Select Charter'])

@section('content')
	<h1 class="title">{{$service->fromlocation->location_name}} to {{$service->tolocation->location_name}}	</h1>
	<p class="text-right"><a data-toggle="modal" data-target="#myModal" href="#"><img src="{{URL::asset('img/view_map_icon.jpg')}}" alt=""></a></p>
	
	<?php
	$options = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];
	$i = 1;
	$a = 0;
	 foreach ($aircrafts as $aircraft):?>
	 <?php if($i == 1): ?><div class="row" style="margin-bottom:25px"><?php endif;?>
		<div class="col-md-2">
			<div style="background:#69ABE2;padding:3px;min-height:170px">
				<p class="text-center" style="font-size:16px"><strong style="color:#0d5bae">Option {{isset($options[$a]) ? $options[$a] : ''}}</strong></p>
				<p class="text-center" style="color:#FFF;font-size:16px">{{$aircraft->name}} <br /> 
				<?php $pilotString = $aircraft->pilot > 1 ? "Pilots" : "Pilot"; ?>
				<?php $passengersString = $aircraft->maxpassengers > 1 ? "Passengers" : "Passenger"; ?>
				{{$aircraft->pilot}} {{$pilotString}} + {{$aircraft->maxpassengers}} {{$passengersString}}
				</p>
			</div>

			<img alt="No picture" src="{{URL::asset('airplains/'.$aircraft->picture_url)}}" class="img-responsive"><br />
			<p class="text-center"><a class="btn btn-danger" href="{{URL::to('charters/request?from='.$service->fromlocation->id.'&to='.$service->tolocation->id.'&aircraft='.$aircraft->id)}}">Request</a></p>
		</div>
		<?php if ($i >= 6){echo '</div>'; $i = 1;} else {$i++;} ?>
	<?php $a++; endforeach; ?>
	<?php if ($i > 1){echo '</div>';} ?>
	

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Map</h4>
      </div>
      <div class="modal-body text-center">
        <img src="{{URL::asset('maps/'.$service->mapimage)}}" alt="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
