@extends('email_template')

@section('content')
	<p><img src="{{URL::asset('logos/'.THESITE::get()->logo)}}" alt="" /></p>
	@include('booking._booking-info') 
@endsection