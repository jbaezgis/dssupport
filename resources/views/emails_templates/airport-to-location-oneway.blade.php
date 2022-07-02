<p style="margin-bottom: 10px;">Hola Sra. <strong>{{ $booking->fullname }}</strong>,</p>

<p style="margin-bottom: 10px;">Gracias por la solicitud de servicio.</p>

<p style="margin-bottom: 10px;">Podemos ofrecer el siguiente traslado privado para la Sra. {{ $booking->fullname }} x {{ $booking->servicePrice->priceOption->name }}:  (Ref. {{ $booking->id }})  <span style="color: red;">Favor dejarnos saber cuántas personas estarán viajando.</span> </p>

<p style="margin-bottom: 10px;">
    {{ date('j F Y', strtotime($booking->arrival_date)) }},    ({{$booking->arrival_airline}}-{{$booking->flight_number}} {{ date('g:i A', strtotime($booking->arrival_time)) }} llegada),
    {{ date('g:i A', strtotime($booking->arrival_time)) }} {{$booking->alias_location_from}} -  {{$booking->alias_location_to}}
</p>

<p style="margin-bottom: 10px;">
    Total:  US$ <strong>{{number_format($booking->order_total, 2, '.', ',')}}</strong>  -  Favor entrar por el siguiente enlace para seguir con su pago en línea.  Confirmare tan pronto como recibamos su pago.
</p>

Stripe link.

Su chofer tendrá un letrero con su número y estara esperando en la salida de la terminal de llegada en el aeropuerto de PUJ.

Gracias de antemano por reservar con Dominican Shuttles.

Saludos cordiales,

Case
