@extends('app', ['menu' => 'scheduledflights'])



@section('content')
<h1 class="title">Airport Transfers & Shuttle Service</h1>

<fieldset>
<p style="font-weight:bold">You have successfully submitted your {{strtoupper($booking->type)}} Shuttle Request. After paying the down payment you will get an e-mail confirmation from us.</p>

<p>Please proceed with your down payment. You can make the down payment with your Credit Card only or if you prefer you can make your down payment with Pay Pal. If you pay with Pay Pal click on the "Pay Now" button below. If you chose to pay the full amount there is not further payment due to the driver other than a tip of your choice. If you make only a down payment please pay the remainder due, in cash, to the driver.</p>

<p>Cancellation Policy - 48 hours before scheduled departure time 100 % refund, 24 - 48 hours before scheduled departure time 50 % refund, 24 hours or less before scheduled departure time NO REFUND.</p>
</fieldset>

@include('booking.flights._flight_show')
@include('booking._make_payment')

@endsection

@section('footer')
<script type="text/javascript" src="{{URL::asset('js/payment.js')}}"></script>
@endsection
