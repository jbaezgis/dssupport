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
    protected $queryString = [
        'bookingkey' => ['except' => '']
    ];

    public $booking, $project_name, $id_task, $tasks, $project_id, $user_id, $name, $details, $status_id;
    public $bookingkey;
    public $type = 'oneway';
    public $showDiv = false;

    public function mount($id)
    {
        // $this->booking = Booking::find($id);
        $this->booking = Booking::where('id', $id)->where('bookingkey', $this->bookingkey)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.booking-form')->layout('layouts/mobile');
    }

    public function save()
    {
        Booking::updateOrCreate(['id'=>$this->id_booking],
        [
            'from_place' => $this->from_place,
            'to_place' => $this->to_place,
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'type' => $this->type,
            'status' => 'pending',
            'active' => 1,
        ]);

        return redirect()->to('/booking-details');
    }

    public function openDiv()
    {
        $this->showDiv =! $this->showDiv;
    }

}
