@extends('layouts.app', ['menu' => 'ferryshuttle', 'title' => 'Ferry & Shuttles Service'])

@section('content')

<!-- PAGE CONTENT-->

<img class="img-responsive" src="{{URL::asset('img/shuttleferry.jpg')}}" />
<br>

<p>As an attractive and affordable option we offer a Ferry &amp; Shuttle combination between the areas of Punta Cana and Samana. Your private vehicle will pick you up at any hotel in the Punta Cana area (Cap Cana, Bavaro, Macao, Uvero Alto) at 07:00 am for a 3.5 hour trip through the Dominican countryside off the beaten tourist track, giving you a great opportunity get a glimpes of Dominican rural life. You will pass through scenic hills, via the agricultural towns of El Seibo and Hato Mayor arriving at the lazy fishing town of Sabana de la Mar from where your ferry will depart for the tranquil crossing of beautiful Samana Bay to the town of Santa Barbara de Samana. The ferry ride takes approximately 50 minutes and is a ‘passenger only’ boat (no cars). Note this is a local ferry, and while it is perfectly safe, please don’t expect to be served champagne by a crew in starched whites!</p>

<a href="{{url('ferryshuttle/location/32')}}">Punta Cana Area (Punta Cana, Cap Cana, Bavaro, Macao, Uvero Alto) to Samana Area (Samana, Cayo Levantado, Puerto Bahia, Las Terrnas, Las Galeras) (Shuttle &amp; Ferry Combinations):<img src="{{URL::asset('img/btn-book-now.png')}}" /></a>
<br>

<p>The ferry departs from Sabana de la Mar at 11:00 am, arriving at the Samana Pier at 11:50 am, where another private vehicle will be waiting to transfer you to your final destination in the Samana area (Samana town, Cayo Levantado, Puerto Bahia, Las Terrenas, Las Galeras).</p>
<p>Pricing from the Punta Cana area to the Samana ferry pier (including the ferry fare) is: U$ 189.00 for the 1st person, U$ 40.00 for each additional person. From there, if you require private service to your final destination, additional pricing for up to 7 people is as follows:</p>
<ul>
 	<li>Hotel Gran Bahia Principe Cayacoa: U$ 15.00</li>
 	<li>Cayo Levantado: U$ 35.00</li>
 	<li>Puerto Bahia hotels: U$ 50.00</li>
 	<li>Las Galeras: U$ 60.00</li>
 	<li>Las Terrenas: U$ 70.00</li>
 	<li>Sabana de la Mar is literally the end of the road, and is also the departure point for entry to fascinating</li>
</ul>

<p>Los Haitises National Park (please visit our Excursion Site: toursdominicansrepublic.com for more information and the opportunity to book an excursion to this spectacular National Park). Your Ferry &amp; Shuttle trip can be combined with a night or two spent at the amazing Eco-hotel Paraiso Caño Hondo where the excursions into Los Haitises are also offered. The stay at this very special hotel, as well as the tours they offer can be booked through us. Please click here for more information.</p>

<a href="{{url('ferryshuttle/location/31')}}">Samana Area (Las Terrenas, Samana, Las Galeras) to Punta Cana Area (Punta Cana, Bavaro, Macao, Uvero Alto)(Ferry &amp; Shuttle Combinations):<img src="{{URL::asset('img/btn-book-now.png')}}" /></a>
<br>

<p>From the Samana area back to any hotel in the Punta Cana area or Punta Cana Airport (PUJ), the ferry departs from the Samana Pier at 09:00 am. We offer private shuttle service directly from your hotel anywhere in the Samana area to catch the 09:00 am ferry. Pricing from the Sabana de la Mar ferry landing to the Punta Cana area and Punta Cana Airport (PUJ) where you will arrive before 02:00 pm, is: U$ 189.00 for the 1st person, U$ 40.00 for each additional person. This includes the ferry fare. Pickup times and additional pricing for up to 7 people from the different locations are as follow:</p>
<ul>
 	<li>Hotel Gran Bahia Principe Cayacoa: 08:15 am (U$ 15.00)</li>
 	<li>Cayo Levantado: 08:10 am - take the 08:00 am ferry to the mainland (U$ 35.00)</li>
 	<li>Puerto Bahia hotels: 08:00 am (U$ 50.00)</li>
 	<li>Las Galeras: 07:30 am (U$ 70.00)</li>
 	<li>Las Terrenas: 07:30 am (U$ 70.00)</li>
</ul>

<p>The road trip from the Sabana de la Mar ferry landing back to Punta Cana passes through beautiful rural scenery including the agricultural towns of Hato Mayor and El Seibo and can be combined with a night or two at the specatacular Eco-hotel Paraiso Caño Hondo where private excursions into Los Haitises National Park are offered. Your stay at this very special hotel, as well as the tours to the fascinating Los Haitises that are offered can be booked through us. Please click here for more information. Please also visit our Excursion Site: toursdominicansrepublic.com for more information and the opportunity to book an independent excursion to this spectacular National Park, featuring mangroves alive with flora and fauna as well as magnificent caves displaying Taino indiginous art on the walls.</p>
	
<!--{!! $page->content !!}-->	
@endsection