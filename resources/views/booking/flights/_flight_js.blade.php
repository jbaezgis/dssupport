<script type="text/javascript">
var childSeatPrice = {{$service->price_per_children}};
</script>
<script src="{{URL::asset('/btdatepicker/js/bootstrap-datepicker.min.js')}}"></script>

<script>
    $(document).ready(function(){
        $('#Clk_submit_booking').click(function(){
            $('#Clk_submit_booking').val('Sending...');
            $.ajax({
                url : site_url+'/submit-flight-service',
                type : 'POST',
                data : $('#bookingForm').serialize(),
                dataType : 'json',
                success : function(data){
                    location.href = site_url+'/make-payment-flight/?bookingkey='+data.booking_key;
                },
                error : function(error){
                    $("html, body").animate({"scrollTop": "0px"}, 500);
                     //alert('Your form has some errors, please fill all required fields');
                    $('#Clk_submit_booking').val('Book Now');

                    $('.form-errors').fadeIn().html('');
                    $('.form-errors').append('<ul>');
                    $.each(error.responseJSON, function(index, value){
                        $('.form-errors').append('<li>'+value+'</li>');
                    });

                    $('.form-errors').append('</ul>');
                }
            });

            return false;
        });

        function calculatePrice(){
            var price = parseFloat($("#CH_product_variation option:selected").data('price'));
            var priceAditionalShuttleFrom = parseFloat($("#aditional_shuttle_from option:selected").data('price'));
            var priceAditionalShuttleTo = parseFloat($("#aditional_shuttle_to option:selected").data('price'));
            var maxp = parseInt($("#CH_product_variation option:selected").data('maxpassengers'));

            var total = price * maxp;
            var childseats_upto12month = $("select[name='child_seat']").val();

            if (priceAditionalShuttleFrom){
                total += priceAditionalShuttleFrom;
            }
            if (priceAditionalShuttleTo){
                total += priceAditionalShuttleTo;
            }

            total += (parseInt(childseats_upto12month)) * childSeatPrice;

            //var shuttlePayment = parseFloat($('#shuttle_payment').text());
            //total += shuttlePayment;

            @if ($way == 'roundtrip')
                var shuttlePaymentReturn = parseFloat($('#shuttle_payment_return').text());
                var returnFare = shuttlePaymentReturn + (price * maxp);
                $('#return_fare').text(returnFare.toFixed(2));

                /*var totalRoundTrip = (price * maxp) * 2;
                //totalRoundTrip += shuttlePayment;
                totalRoundTrip += shuttlePaymentReturn;*/
                $('#sp_price').text(total.toFixed(2));

                var onwardFare = parseFloat(total);
                var returnFare = parseFloat($('#return_fare').text());
                var totalRoundTrip = onwardFare + returnFare;

                console.log(onwardFare);
                console.log(returnFare);
                console.log(totalRoundTrip);

                $('#total_roundtrip').text(totalRoundTrip.toFixed(2));
            @else
                $('#sp_price').text(total.toFixed(2));
            @endif

            //$('#sp_price').text(total.toFixed(2));
            $('#price_per_passenger').text(price.toFixed(2));
        }

        function maxpassengers(){
            var passengerTemplate = $('#passengers_template').html();
            var maxp = parseInt($("#CH_product_variation option:selected").data('maxpassengers'));
            var currentValue = $("#passengers").val() ? $("#passengers").val() : 1;
            $('#passengers_wrapp').empty();
            for (var i = 1; i <= (maxp - 1); i++){
                $('#passengers_wrapp').append(passengerTemplate);
                $('#passengers_wrapp > div:last-child').find('.col-md-1').html((i + 1));
            }
        }

        maxpassengers();

        $('#arrival_hour, #arrival_minutes, #arrival_meridiam').change(function(){
            addPickupMinutes();
        });

        $('#CH_product_variation, .CH_childseat').change(function(){
            calculatePrice();
            maxpassengers();
        });

        // $('#aditional_shuttle_from, #aditional_shuttle_to').change(function(){
        // 	calculatePrice();
        // });

        $('#aditional_shuttle_from').change(function(){
            var price = parseFloat($("#aditional_shuttle_from option:selected").data('price'));
            var duration = $("#aditional_shuttle_from option:selected").data('duration');
            var pickup = $("#aditional_shuttle_from option:selected").data('pickuptime');
            if (price){
                var priceT = parseFloat($("#aditional_shuttle_to option:selected").data('price'));
                var shuttlePayment = price;
                if (priceT){
                    shuttlePayment = price + priceT;
                }
                $('#shuttle_payment').text(shuttlePayment.toFixed(2));
                $('#shuttle_price_from').text(price.toFixed(2));
            } else {
                $('#shuttle_price_from, #shuttle_payment').text(0);
            }

            if (duration){
                $('#shuttle_duration_from').text(duration);
            }
            if (pickup){
                $('#shuttle_pickuptime_from').text(pickup);
                $('#hotel_pickedup').val(pickup);
            } else {
                $('#hotel_pickedup').val('');
            }

            calculatePrice();
        });

        $('#aditional_shuttle_to').change(function(){
            var price = parseFloat($("#aditional_shuttle_to option:selected").data('price'));
            var duration = $("#aditional_shuttle_to option:selected").data('duration');
            var pickup = $("#aditional_shuttle_to option:selected").data('pickuptime');
            if (price){
                var priceT = parseFloat($("#aditional_shuttle_from option:selected").data('price'));
                var shuttlePayment = price;
                if (priceT){
                    shuttlePayment = price + priceT;
                }
                $('#shuttle_payment').text(shuttlePayment.toFixed(2));
                $('#shuttle_price_to').text(price.toFixed(2));
            } else {
                $('#shuttle_price_to, #shuttle_payment').text(0);
            }

            if (duration)
                $('#shuttle_duration_to').text(duration);
            if (pickup){
                //$('#shuttle_pickuptime_to').text(pickup);
                $('#shuttle_pickuptime_to').text("Upon arrival");
            }

            calculatePrice();
        })

        @if ($way == 'roundtrip')
        $('#aditional_shuttle_from_return').change(function(){
            var price = parseFloat($("#aditional_shuttle_from_return option:selected").data('price'));
            var duration = $("#aditional_shuttle_from_return option:selected").data('duration');
            var pickup = $("#aditional_shuttle_from_return option:selected").data('pickuptime');
            if (price){
                var priceT = parseFloat($("#aditional_shuttle_to_return option:selected").data('price'));
                var shuttlePayment = price;
                if (priceT){
                    shuttlePayment = price + priceT;
                }

                $('#shuttle_payment_return').text(shuttlePayment.toFixed(2));
                $('#shuttle_price_from_return').text(price.toFixed(2));
            }
            if (duration){
                $('#shuttle_duration_from_return').text(duration);
            }
            if (pickup){
                //$('#shuttle_pickuptime_from_return, #hotel_pickedup_return').text(pickup);
                $('#shuttle_pickuptime_from_return').text("Upon arrival");
                $('#hotel_pickedup_return').val('Upon arrival');
            }

            calculatePrice();
        });

        $('#aditional_shuttle_to_return').change(function(){
            var price = parseFloat($("#aditional_shuttle_to_return option:selected").data('price'));
            var duration = $("#aditional_shuttle_to_return option:selected").data('duration');
            var pickup = $("#aditional_shuttle_to_return option:selected").data('pickuptime');
            if (price){
                var priceF = parseFloat($("#aditional_shuttle_from_return option:selected").data('price'));
                var shuttlePayment = price;
                if (priceF){
                   var shuttlePayment = price + priceF;
                }                

                 $('#shuttle_payment_return').text(shuttlePayment.toFixed(2));
                 $('#shuttle_price_to_return').text(price.toFixed(2));
            }
            if (duration)
                $('#shuttle_duration_to_return').text(duration);
            if (pickup)
                $('#shuttle_pickuptime_to_return').text(pickup);

            calculatePrice();
        })
        @endif
    });

    function to24Hour(str) {
        var tokens = /([10]?\d):([0-5]\d) ([ap]m)/i.exec(str);
        if (tokens == null) { return null; }
        if (tokens[3].toLowerCase() === 'pm' && tokens[1] !== '12') {
            tokens[1] = '' + (12 + (+tokens[1]));
        } else if (tokens[3].toLowerCase() === 'am' && tokens[1] === '12') {
            tokens[1] = '00';
        }
        return tokens[1] + ':' + tokens[2];
    }

    function formatAMPM(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var ampm = hours >= 12 ? 'pm' : 'am';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0'+minutes : minutes;
        var strTime = hours + ':' + minutes + ' ' + ampm;
        return strTime;
    }

    function addMinutes(date, minutes) {
        return new Date(date.getTime() + minutes*60000);
    }

    function addPickupMinutes(){
        var hour = $('#arrival_hour').val();
        var minute = $('#arrival_minutes').val();
        var meridiam = $('#arrival_meridiam').val();
        var hour24 = to24Hour(hour+':'+minute+' '+meridiam);
        var parts = hour24.split(":");
        hour = parts[0];
        minutes = parts[1];

        var minutevariation = addMinutes(new Date(0,0,0, hour, minute), 30);
        $('#pickup_time').val(formatAMPM(minutevariation));
    }

    $('.arrival_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose : true,
        startDate: "-",
        clearBtn: true,
        todayHighlight: true
    });

</script>
