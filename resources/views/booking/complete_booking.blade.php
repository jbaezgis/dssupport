@extends('app', ['hidesidebar' => true, 'title' => 'Thank You'])

@section('head')
    @include('_conversion_code')
@endsection


@section('content')
<h1 class="title">Thank you for booking with Dominican Shuttles.</h1><br>

<div class="container text-center paymentoptions" >
    <div class="row">
        <div class="col-lg-12">
            <h3>Your booking payment options:</h3> <br>
        </div>
        <?php $paymentAnchor = '#payment'; ?>
        <div class="col-lg-6 text-right">
            <h2 class="title">Paypal |  <a class="btn btn-primary btn-med" href="{{ $paymentUrl.'&option=paypal'.$paymentAnchor }}">Click Here</a><h2/>
        </div>
        <div class="col-lg-6 text-left">
           <h2 class="title"> Credit Card | <a class="btn btn-primary btn-med" href="{{ $paymentUrl.'&option=cc'.$paymentAnchor }}">Click Here</a><h2/>
        </div>
       <br>
    </div>  
</div>
<br>,<br>

<!-- <div class="text-left">
	<a class="btn btn-primary" href="{{URL::to('products/add?bookingkey='.$bookingkey)}}">Yes</a>
	<a class="btn btn-primary" href="{{URL::to('booking/confirm?bookingkey='.$bookingkey)}}">No</a>
</div>
 -->
<div class="spacer40"></div>
@endsection