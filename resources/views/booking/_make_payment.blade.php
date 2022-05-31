@section('head')
<link rel="stylesheet" href="/assets/font-awesome-4.7.0/css/font-awesome.min.css">
@endsection

@if ($booking->status != 'paid') 
{!! Form::open(['url' => 'applycoupon']) !!}
{!! Form::hidden('booking_id', $booking->id) !!}

<div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Do you have a coupon code?</h3>
    </div>
  <div class="box-body">
      <div class="row">
        @if (empty($booking->coupon))
        <div class="form-group">
          <label class="control-label col-md-1">Code</label>
          <div class="col-md-2"> 
            {!! Form::text('code', null, ['class' => 'form-control input-sm']) !!} 
          </div>
          <div class="col-md-2">
            {!! Form::submit('Apply Coupon', ['class' => 'btn btn-default']) !!}
          </div>
        </div>
        @else
          <div class="" style="background:#feffdb;padding:5px 5px 5px 20px;border:1px solid #f8f9a7;width:95%;margin:auto">
            <a class="pull-right" href="{{URL::to('removecoupon/'.$booking->id)}}">Remove</a>
            <h5>Coupon <strong>"{{$booking->coupon}}"</strong> applied. (<i>{{$booking->coupon_text}} </i>)
            </h5>
          </div>
        @endif
      </div>
  </div>
</div>
{{-- <fieldset>
	<legend>Do you have a coupon code?</legend>
<div class="row">
	@if (empty($booking->coupon))
	<div class="form-group">
		<label class="control-label col-md-1">Code</label>
		<div class="col-md-2"> 
			{!! Form::text('code', null, ['class' => 'form-control input-sm']) !!} 
		</div>
		<div class="col-md-2">
			{!! Form::submit('Apply Coupon', ['class' => 'btn btn-warning']) !!}
		</div>
	</div>
	@else
		<div class="" style="background:#feffdb;padding:5px 5px 5px 20px;border:1px solid #f8f9a7;width:95%;margin:auto">
			<a class="pull-right" href="{{URL::to('removecoupon/'.$booking->id)}}">Remove</a>
			<h5>Coupon <strong>"{{$booking->coupon}}"</strong> applied. (<i>{{$booking->coupon_text}} </i>)
			</h5>
		</div>
	@endif
</div>
</fieldset> --}}
{!! Form::close() !!}


<div class="box box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Payment Options</h3>
    </div>
  <div class="box-body">
      @if($booking->bookingtype != 'ferryshuttle')
        <div class="row">
          <div class="form-group">
            <div class="col-md-12"> 
              <label>
                <input type="radio" class="payment-option" name="payment_option" value="upfront" checked onclick="setPaymentOption('{{$priceCalculation->upfrontPayment}}', '{{$priceCalculation->cashPayment}}')"> 
                Online Down Payment
              </label>
              = U$ <span id="">{{number_format($priceCalculation->upfrontPayment, 2, '.', ',')}}</> 
            + <strong>Cash to the Driver upon Arrival</strong> = U$ <span id="">{{number_format($priceCalculation->cashPayment, 2, '.', ',')}}</span>
            </div>
          </div>
        </div>
        @endif

        <div class="row">
          <div class="form-group">
            <div class="col-md-12"> 
              <label><input type="radio" class="payment-option" {{$booking->bookingtype == 'ferryshuttle' ? 'checked' : ''}} name="payment_option" value="full" onclick="setPaymentOption('{{$priceCalculation->totalToPay}}', 0)"> 
                Online Full Payment
              </label>
              <span>= US$ {{number_format($priceCalculation->totalFair, 2, '.', ',')}}</span>
            </div>
          </div>
        </div>

        <br />
        {{-- @if($booking->bookingtype== 'ferryshuttle')
        <div><strong>Online Payment</strong> = U$<span id="online_payment">{{$priceCalculation->upfrontPayment}}</span> 
        </div>
        @else
        <div><strong>Online Down Payment</strong> = U$<span id="online_payment">{{$priceCalculation->upfrontPayment}}</span> 
        + <strong>Cash to the Driver upon Arrival</strong> = U$<span id="cash_payment">{{$priceCalculation->cashPayment}}</span>
        </div>
      @endif --}}
  </div>
</div>

{{-- <br />
<a name="payment" id="payment"></a>
<fieldset>
	<legend>Payment Options</legend>
@if($booking->bookingtype != 'ferryshuttle')
<div class="row">
	<div class="form-group">
		<div class="col-md-5"> 
			<label><input type="radio" class="payment-option" name="payment_option" value="upfront" checked onclick="setPaymentOption('{{$priceCalculation->upfrontPayment}}', '{{$priceCalculation->cashPayment}}')"> Online Down Payment</label>
		</div>
	</div>
</div>
@endif

<div class="row">
	<div class="form-group">
		<div class="col-md-5"> 
			<label><input type="radio" class="payment-option" {{$booking->bookingtype == 'ferryshuttle' ? 'checked' : ''}} name="payment_option" value="full" onclick="setPaymentOption('{{$priceCalculation->totalToPay}}', 0)"> Online Full Payment</label>
		</div>
	</div>
</div>

<br />
@if($booking->bookingtype== 'ferryshuttle')
<div><strong>Online Payment</strong> = U$<span id="online_payment">{{$priceCalculation->upfrontPayment}}</span> 
</div>
@else
<div><strong>Online Down Payment</strong> = U$<span id="online_payment">{{$priceCalculation->upfrontPayment}}</span> 
+ <strong>Cash to the Driver upon Arrival</strong> = U$<span id="cash_payment">{{$priceCalculation->cashPayment}}</span>
</div>
@endif
</fieldset> --}}

@include('payments._payment-methods')


@endif

@section('footer')
<script type="text/javascript" src="{{URL::asset('js/payment.js')}}"></script>
<script src='https://js.stripe.com/v2/' type='text/javascript'></script>
<script>
    (function($){
        $('#accordion').collapse({
            toggle: true
        });

        $('form.require-validation').bind('submit', function(e) {
            var $form         = $(e.target).closest('form'),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                 'input[type=text]', 'input[type=file]',
                                 'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid         = true;

            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
              var $input = $(el);
              if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault(); // cancel on first error
              }
            });
        });

        var $form = $("#payment-form");

        $form.on('submit', function(e) {
            if (!$form.data('cc-on-file')) {
              e.preventDefault();
              Stripe.setPublishableKey($form.data('stripe-publishable-key'));
              Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
              }, stripeResponseHandler);
            }
          });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                // token contains id, last4, and card type
                var token = response['id'],
                    paymentType = $('.payment-option:checked').val();
                // insert the token into the form so it gets submitted to the server
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripe_token' value='" + token + "'/>");
                $form.append("<input type='hidden' name='payment_option' value='" + paymentType + "'/>");

                $form.get(0).submit();
            }
        }

    })(jQuery);
</script>
@endsection



@section('stripe_scripts')
<script type="text/javascript" src="{{URL::asset('js/payment.js')}}"></script>
<script src='https://js.stripe.com/v2/' type='text/javascript'></script>
<script>
    (function($){
        $('#accordion').collapse({
            toggle: true
        });

        $('form.require-validation').bind('submit', function(e) {
            var $form         = $(e.target).closest('form'),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                 'input[type=text]', 'input[type=file]',
                                 'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid         = true;

            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
              var $input = $(el);
              if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault(); // cancel on first error
              }
            });
        });

        var $form = $("#payment-form");

        $form.on('submit', function(e) {
            if (!$form.data('cc-on-file')) {
              e.preventDefault();
              Stripe.setPublishableKey($form.data('stripe-publishable-key'));
              Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
              }, stripeResponseHandler);
            }
          });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                // token contains id, last4, and card type
                var token = response['id'],
                    paymentType = $('.payment-option:checked').val();
                // insert the token into the form so it gets submitted to the server
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripe_token' value='" + token + "'/>");
                $form.append("<input type='hidden' name='payment_option' value='" + paymentType + "'/>");

                $form.get(0).submit();
            }
        }

    })(jQuery);
</script>
@endsection
