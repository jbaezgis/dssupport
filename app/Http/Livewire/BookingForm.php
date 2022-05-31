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
    public $service, $project_name, $id_task, $tasks, $project_id, $user_id, $name, $details, $status_id;

    public function mount($id)
    {
        $this->service = Service::find($id);
    }

    public function render()
    {
        return view('livewire.booking-form');
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

}
