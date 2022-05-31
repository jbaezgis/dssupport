@extends('layouts.app', ['menu' => 'groundtransfer'])

@section('content')
<h1 class="title">Airport Transfers & Shuttle Service</h1>

@if (Session::has('info'))

   <div class="alert alert-danger">{{ Session::get('info') }}</div>

@endif


<h4>You have successfully submitted your {{strtoupper($booking->type)}} Shuttle Request.{{-- After paying the down payment you will get an e-mail confirmation from us.--}}  Thank you for your booking, please review the details below and you will receive an email confirmation immediately after payment.</h4>
{{-- <fieldset>

<p>Please proceed with your down payment. You can make the down payment with your Credit Card only or if you prefer you can make your down payment with Pay Pal. If you pay with Pay Pal click on the "Pay Now" button below. If you chose to pay the full amount there is not further payment due to the driver other than a tip of your choice. If you make only a down payment please pay the remainder due, in cash, to the driver.</p>

<p>Cancellation Policy - 48 hours before scheduled departure time 100 % refund, 24 - 48 hours before scheduled departure time 50 % refund, 24 hours or less before scheduled departure time NO REFUND.</p>
</fieldset> --}}

<?php
	$switch = Request::get('viewby');
?>
@include('booking.transfers._transfer_show')
@if(isset($switch))

@else
@include('booking._make_payment')
@endif

<p>
   <strong>Cancellation Policy</strong> - 48 hours before scheduled departure time 100 % refund, 24 - 48 hours before scheduled departure time 50 % refund, 24 hours or less before scheduled departure time NO REFUND.
</p>

@endsection
