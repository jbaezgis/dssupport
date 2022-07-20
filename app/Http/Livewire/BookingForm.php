<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use App\Models\Booking;
use App\Models\Location;
use App\Models\LocationAlias;
use App\Models\Service;
use Carbon\Carbon;

class BookingForm extends Component
{
    use WithPagination;
    use Actions;
    
    protected $queryString = [
        'bookingkey' => ['except' => '']
    ];

    public $id_booking, $booking, $fullname, $email, $phone, $language, $arrival_date, $arrival_time, $arrival_airline, $arrival_flight, $more_information;
    public $bookingkey;
    public $type = 'oneway';
    public $showDiv = false;
    public $willArriveData;

    protected $rules = [
        'fullname' => 'required',
        'email' => 'required|email',
        'phone' => 'required|min:10',
        'language' => 'required',
        'arrival_date' => 'required',
    ]; 

    public function mount($id)
    {
        // $this->booking = Booking::find($id);
        $this->booking = Booking::where('id', $id)->where('bookingkey', $this->bookingkey)->firstOrFail();
        $this->fullname = $this->booking->fullname;
        $this->email = $this->booking->email;
        $this->phone = $this->booking->phone;
        $this->passengers = $this->booking->passengers;
        $this->arrival_date = $this->booking->arrival_date;
        $this->arrival_time = $this->booking->arrival_time;
        $this->language = $this->booking->language;
        $this->more_information = $this->booking->more_information;
        $this->arrival_airline = $this->booking->arrival_airline;
        $this->flight_number = $this->booking->flight_number;

        $this->want_to_arrive = $this->booking->want_to_arrive;
        $this->pickup_time = $this->booking->pickup_time;
        $this->return_date = $this->booking->return_date;
        $this->return_airline = $this->booking->return_airline;
        $this->return_flight_number = $this->booking->return_flight_number;
        $this->return_want_to_arrive_2 = $this->booking->return_want_to_arrive_2;
        $this->return_time_2 = $this->booking->return_time_2;
        $this->return_pickup_time_2 = $this->booking->return_pickup_time_2;
        $this->return_more_information = $this->booking->return_more_information;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {

        $this->willArriveData = [
			'90' => '1 hour 30 min',
			'120' => '2 hours 00 min',
			'150' => '2 hours 30 min',
			'180' => '3 hours 00 min',
			'210' => '3 hours 30 min'
		];
        return view('livewire.booking-form');
    }

    public function save()
    {
        Booking::updateOrCreate(['id'=>$this->id_booking],
        [
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'language' => $this->language,
            'arrival_date' => $this->arrival_date,
            'arrival_time' => $this->arrival_time,
            'arrival_airline' => $this->arrival_airline,
            'arrival_flight' => $this->arrival_flight,
            'more_information' => $this->more_information,
        ]);

        $this->notification()->success(
            $title = $this->id_booking ? __('Booking updated!') : __('booking added!'),
            $description = $this->id_booking ? __('booking updated correcly.') : __('Project added correcly.')
        );

        // return redirect()->to('/booking-details');
    }

    public function openDiv()
    {
        $this->showDiv =! $this->showDiv;
    }

}
