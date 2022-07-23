<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dominican Shuttles</title>

    <style>
        a {
            /* color: #007bff; */
            text-decoration: none;
            background-color: transparent;
        }
        .btn {
            display: inline-block;
            margin-bottom: 0;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            border-radius: 4px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4;
        }
    </style>
</head>
<body style="margin: auto; width: 80%">
    <p>Dear {{ $booking->fullname }},</p> 
    <p>Thank you for booking with Dominican Shuttles! We are pleased to confirm your Transfer.</p> 
    <p>All our rides adhere to our Health and Safety Standards, The vehicle will be sanitized before your pickup and
    your chauffeur will greet you with a bow instead of a handshake.</p> 
    <p>Below is the summary of your upcoming Transfer,</p> 
    <!-- <p style="text-align: center;"><img src="https://dominicanshuttles.com/logos/1465152109logo.png" alt="Dominican Shuttles" /></p> -->
    <div style="border-bottom: 1px solid #ccc;"></div>
    <h2>Order #{{ $booking->id }}</h2>
    <div style="border-bottom: 1px solid #ccc; margin-bottom: 10px;"></div>
    <table class="table">
        <tbody>
            <tr>
                <td style="width: 40%">Full name:</td>
                <td>{{ $booking->fullname }}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{ $booking->email }}</td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td>{{ $booking->phone }}</td>
            </tr>
            <tr>
                <td>Preferred language:</td>
                <td>
                    @if ($booking->language == 'es')
                        Español
                    @else
                        English
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    <h2>Requested Private Shuttle Service</h2> 
    <!-- <h2>Booking Confirmation</h2> -->
    <div style="border-bottom: 1px solid #ccc; margin-bottom: 10px;"></div>
    <table class="table">
        <tbody>
            <tr>
                <td style="width: 40%">From:</td>
                {{-- <td>{{ $booking->service->fromlocation->location_name }}</td> --}}
                <td>{{ $booking->alias_location_from }} </td>
            </tr>
            <tr>
                <td>To:</td>
                {{-- <td>{{ $booking->service->tolocation->location_name}}</td> --}}
                <td>{{ $booking->alias_location_to }} </td>
            </tr>
            @if($booking->arrival_airline)
                <tr>
                    <td>Arrival Airline:</td>
                    {{-- <td>{{ $booking->service->tolocation->location_name}}</td> --}}
                    <td>{{ $booking->arrival_airline }} </td>
                </tr>
            @endif
            @if($booking->flight_number)
                <tr>
                    <td>Flight Number:</td>
                    {{-- <td>{{ $booking->service->tolocation->location_name}}</td> --}}
                    <td>{{ $booking->flight_number }} </td>
                </tr>
            @endif
            <tr>
                <td>Type</td>
                <td>{{ $booking->type }}</td>
            </tr>
            <tr>
                <td>Order Total</td>
                <td>US$ {{number_format($booking->order_total, 2, '.', ',')}}</td>
            </tr>
        </tbody>
    </table>
    
    {{-- <a href="{{ url('make-payment-transfer?bookingkey='.$booking->bookingkey) }} " class="btn"></a> --}}
    <a href="{{ url('booking-details/'.$booking->id.'?bookingkey='.$booking->bookingkey) }} " class="btn">View Booking</a>

    <p>Check all your information above and let us know if there is a mistake.</p>
    <p>Please send Mail to info@dominicanshuttles.com for any question.</p>
    <p>Your driver will have a sign with your name and will be waiting at your pickup location.</p>
    <p>Thank you very much for booking with Dominican Shuttles.</p>
    <p>Kind regards,</p>

    <p><img class="img-responsive" src="{{URL::asset('images/logo.png')}}" height="60" alt=""></p>
    www.dominicanshuttles.com
 
    <p><strong>DominicanShuttles LLC</strong> </p>
     
    <p><strong>Luefty GmbH</strong><br>
    Tuchlauben 8, 1010 Vienna, Austria <br>
    <strong>Luefty International LLC.</strong> <br>
    New York City<br>

    <div style="text-align: center; padding: 20px; background: #f1f1f1; margin-top: 20px;">© {{ date('Y')}} Dominicanshuttles. All rights reserved.</div>
</body>
</html>