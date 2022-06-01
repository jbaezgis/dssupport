<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Location;
use App\Models\Service;
use App\Models\LocationAlias;
use App\Models\BookingMeta;
use App\Http\Requests;
use App\Libraries\BookingRequestHelper;
use App\Repositories\LocationRepository;
use App\Repositories\BookingRepository;
use App\Events\TransferRequestedEvent;
use App\Services\PriceCalculator;
use App\Mail\TransferConfirmation;
use Mail;
use DB;
use Log;
use Hash;
use App\Repositories\PageRepository;
use App\Place;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function oneway(Request $request)
    {

		$service = Service::findOrFail($request->service_id);
		
        $booking = new Booking();
        $hashstring = 'secret-@#-'.$booking->id;
		$booking->bookingkey = Hash::make($hashstring);
        $booking->service_id = $request->service_id;
        $booking->service_price_id = $request->service_price_id;
        $booking->bookingtype = 'groundtransfer';
		$booking->from_place = $request->from_place;
		$booking->alias_location_from = $request->alias_location_from;
		$booking->to_place = $request->to_place;
		$booking->alias_location_to = $request->alias_location_to;
		$booking->type = 'oneway';
		$booking->arrival_date = $request->arrival_date;
		$booking->arrival_time = '06:00:00';
		$booking->passengers = $request->passengers;
		$booking->ip = $request->getClientIp();
		$booking->site_id = 1;
		$booking->search_engine = session('searchengine');;
        $booking->order_total = $request->oneway_price;
        $booking->catering = 0.00;
        $booking->fair = 0.00;
        $booking->extra_payment = 0.00;
        $booking->email_sent = 0;
        $booking->fullname = 'New Client';
        $booking->payment_method = 'N/A';

        $booking->save();

		// return redirect('booking-form?bookingkey='.$booking->bookingkey);
		return redirect('booking-form/'.$booking->id.'?bookingkey='.$booking->bookingkey);
    }

    public function roundtrip(Request $request)
    {

		$service = Service::findOrFail($request->service_id);
		
        $booking = new Booking();
        $hashstring = 'secret-@#-'.$booking->id;
		$booking->bookingkey = Hash::make($hashstring);
        $booking->service_id = $request->service_id;
        $booking->service_price_id = $request->service_price_id;
        $booking->bookingtype = 'groundtransfer';
		$booking->from_place = $request->from_place;
		$booking->to_place = $request->to_place;
		$booking->type = 'roundtrip';
		$booking->arrival_date = $request->arrival_date;
		$booking->arrival_time = '06:00:00';
        $booking->passengers = $request->passengers;
		$booking->ip = $request->getClientIp();
		$booking->site_id = 1;
		$booking->search_engine = session('searchengine');;
        $booking->order_total = $request->roundtrip_price;
        $booking->catering = 0.00;
        $booking->fair = 0.00;
        $booking->extra_payment = 0.00;
        $booking->email_sent = 0;
        $booking->fullname = 'New Client';
        $booking->payment_method = 'N/A';

        $booking->save();

		return redirect('booking-form/'.$booking->id.'?bookingkey='.$booking->bookingkey);
    }

    public function store(Request $request)
    {

		$service = Service::findOrFail($request->service_id);

		$input['ip']			= $request->getClientIp();
		$input['site_id']		= $this->currentSite->id;
		$input['search_engine']	= session('searchengine');
		
		$booking = Booking::create($input);
		$hashstring = 'secret-@#-'.$booking->id;
		$booking->bookingkey = Hash::make($hashstring);
		$booking->phone_dr = $request->phone_dr;
		$booking->more_information = $request->more_information;
		$booking->language = $request->language;

		// Places
		$booking->from_place = $request->from_place;
		$booking->to_place = $request->to_place;

		$booking->arrival_time = date('H:i:s', strtotime($request->arrival_time));
		if ($request->has('arrival_time')){
		}

		if ($request->has('arrival_airline'))
		{
			$booking->arrival_airline = $request->arrival_airline;
			$booking->flight_number = $request->flight_number;
		}
		
		if ($request->has('want_to_arrive'))
		{
			$booking->want_to_arrive = $request->want_to_arrive;
	
			// Calculo de pick up time One way
			$s_time_a = $service->driving_time_minutes;
			$pickup_time_oneway_1 = date('H:i',strtotime("-$s_time_a minutes",strtotime($request->arrival_time)));
			$pickup_time_oneway_2 = date('H:i',strtotime("-$request->want_to_arrive minutes",strtotime($pickup_time_oneway_1)));
			$booking->pickup_time = date('H:i',strtotime("-15 minutes",strtotime($pickup_time_oneway_2)));
		}

		if ($request->type == 'roundtrip'){
			
			// Cambios realizados por Yoel
			$booking->return_airline = $request->return_airline;
			$booking->return_flight_number = $request->return_flight_number;
			$booking->return_want_to_arrive_2 = $request->return_want_to_arrive_2;

			if ($request->has('return_time_2'))
			{
				$booking->return_time_2 = date('H:i:s', strtotime($request->return_time_2));
				$s_time = $service->driving_time_minutes;
				$pickup_time1 = date('H:i',strtotime("-$s_time minutes",strtotime($request->return_time_2)));
				$pickup_time2 = date('H:i',strtotime("-$request->return_want_to_arrive_2 minutes",strtotime($pickup_time1)));
				$booking->return_pickup_time_2 = date('H:i',strtotime("-15 minutes",strtotime($pickup_time2)));
			}
			// end Yoel

			$booking->return_more_information = $request->return_more_information;
		}

		return redirect('make-payment-transfer?bookingkey='.$booking->bookingkey);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
