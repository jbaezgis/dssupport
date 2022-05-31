@extends('layouts.app', ['menu' => 'charters'])

@section('content')
<h1 class="title">Private/Charter Flight Service</h1>

<img class="img-responsive" src="{{URL::asset('img/booking_successfull.jpg')}}" alt="">

<br />
<div style="border:2px solid #ccc;padding:20px 10px">
<strong>{{$booking->fromlocation->location_name}} - {{$booking->tolocation->location_name}}</strong> - :
 Thank you - Your request was successfully submitted - we will contact you within 24 hours with further booking instructions
</div>

@endsection