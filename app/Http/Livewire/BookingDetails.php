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
use App\Models\ActivityLog;

class BookingDetails extends Component
{
    protected $queryString = [
        'bookingkey' => ['except' => '']
    ];

    public $bookingkey, $booking;

    public function mount($id)
    {
        // $this->booking = Booking::find($id);
        $this->booking = Booking::where('id', $id)->where('bookingkey', $this->bookingkey)->firstOrFail();
    }

    public function render()
    {
        ActivityLog::create([
            'user_id' => 0,
            'type' => 'info',
            'module' => 'Transfer',
            'action' => 'Request sent',
            'message' => "Booking id: {$this->booking->id}, From: {$this->booking->alias_location_from} To: {$this->booking->alias_location_to}, Name: {$this->booking->fullname}",
            'user_agent' => request()->server('HTTP_USER_AGENT'),
            'ip' => request()->ip()
        ]);

        return view('livewire.booking-details');
    }
}
