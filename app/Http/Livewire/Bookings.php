<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use App\Models\Booking;

class Bookings extends Component
{
    use WithPagination;
    use Actions;

    protected $queryString = [
        'order' => ['except' => ''],
        'name' => ['except' => ''],
        'email' => ['except' => ''],
        'from' => ['except' => ''],
        'to' => ['except' => ''],
        'arrivalDate' => ['except' => ''],
        'fromDate' => ['except' => ''],
        'toDate' => ['except' => '']
    ];

    // public $bookings;
    public $order = '';
    public $name = '';
    public $email = '';
    public $from = '';
    public $to = '';
    public $arrivalDate = '';
    public $fromDate = '';
    public $toDate = '';

    public function render()
    {
        return view('livewire.bookings', [
            'bookings' => Booking::where('id', 'LIKE', "%{$this->order}%")->where('fullname', 'LIKE', "%{$this->name}%")->where('arrival_date', 'LIKE', "%{$this->arrivalDate}%")->latest()->paginate(10),
        ]);
    }
}
