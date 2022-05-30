<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use App\Models\Booking;
use App\Models\Location;
use Carbon\Carbon;

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
        'toDate' => ['except' => ''],
        'perPage' => ['except' => ''],
        'fromLocation' => ['except' => ''],
        'toLocation' => ['except' => '']
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
    public $fromDate2 = '';
    public $toDate2 = '';
    public $pending = '';
    public $paid = '';
    public $perPage = 15;
    public $locations = '';
    public $fromLocation = '';
    public $toLocation = '';

    public function render()
    {
        $today = Carbon::today();
        $this->locations = Location::get();

        if (!empty($this->fromDate and $this->toDate))
        {
            $this->bookingsCount = Booking::where('id', 'LIKE', "%{$this->order}%")->where('alias_location_from', 'LIKE', "%{$this->fromLocation}%")->where('alias_location_to', 'LIKE', "%{$this->toLocation}%")->where('fullname', 'LIKE', "%{$this->name}%")->where('email', 'LIKE', "%{$this->email}%")->whereBetween('arrival_date', [$this->fromDate, $this->toDate])->count();
            $this->pendingCount = Booking::where('id', 'LIKE', "%{$this->order}%")->where('alias_location_from', 'LIKE', "%{$this->fromLocation}%")->where('alias_location_to', 'LIKE', "%{$this->toLocation}%")->where('fullname', 'LIKE', "%{$this->name}%")->where('email', 'LIKE', "%{$this->email}%")->whereBetween('arrival_date', [$this->fromDate, $this->toDate])->where('status', 'pending')->count();
            $this->paidCount = Booking::where('id', 'LIKE', "%{$this->order}%")->where('alias_location_from', 'LIKE', "%{$this->fromLocation}%")->where('alias_location_to', 'LIKE', "%{$this->toLocation}%")->where('fullname', 'LIKE', "%{$this->name}%")->where('email', 'LIKE', "%{$this->email}%")->whereBetween('arrival_date', [$this->fromDate, $this->toDate])->where('status', 'paid')->count();
            $this->fromDate2 = $this->fromDate;
            $this->toDate2 = $this->toDate;

        }elseif(!empty($this->fromDate))
        {
            $this->bookingsCount = Booking::where('id', 'LIKE', "%{$this->order}%")->where('alias_location_from', 'LIKE', "%{$this->fromLocation}%")->where('alias_location_to', 'LIKE', "%{$this->toLocation}%")->where('fullname', 'LIKE', "%{$this->name}%")->where('email', 'LIKE', "%{$this->email}%")->whereBetween('arrival_date', [$this->fromDate, $today])->count();
            $this->pendingCount = Booking::where('id', 'LIKE', "%{$this->order}%")->where('alias_location_from', 'LIKE', "%{$this->fromLocation}%")->where('alias_location_to', 'LIKE', "%{$this->toLocation}%")->where('fullname', 'LIKE', "%{$this->name}%")->where('email', 'LIKE', "%{$this->email}%")->whereBetween('arrival_date', [$this->fromDate, $today])->where('status', 'pending')->count();
            $this->paidCount = Booking::where('id', 'LIKE', "%{$this->order}%")->where('alias_location_from', 'LIKE', "%{$this->fromLocation}%")->where('alias_location_to', 'LIKE', "%{$this->toLocation}%")->where('fullname', 'LIKE', "%{$this->name}%")->where('email', 'LIKE', "%{$this->email}%")->whereBetween('arrival_date', [$this->fromDate, $today])->where('status', 'paid')->count();
            $this->fromDate2 = $this->fromDate;
            $this->toDate2 = $today;

        }elseif(!empty($this->toDate))
        {
            $this->fromDate2 = date('Y-m-d', strtotime(Booking::min('arrival_date')));
            $this->toDate2 = $this->toDate;
            $this->bookingsCount = Booking::where('id', 'LIKE', "%{$this->order}%")->where('alias_location_from', 'LIKE', "%{$this->fromLocation}%")->where('alias_location_to', 'LIKE', "%{$this->toLocation}%")->where('fullname', 'LIKE', "%{$this->name}%")->where('email', 'LIKE', "%{$this->email}%")->whereBetween('arrival_date', [$this->fromDate2, $this->toDate2])->count();
            $this->pendingCount = Booking::where('id', 'LIKE', "%{$this->order}%")->where('alias_location_from', 'LIKE', "%{$this->fromLocation}%")->where('alias_location_to', 'LIKE', "%{$this->toLocation}%")->where('fullname', 'LIKE', "%{$this->name}%")->where('email', 'LIKE', "%{$this->email}%")->whereBetween('arrival_date', [$this->fromDate2, $this->toDate2])->where('status', 'pending')->count();
            $this->paidCount = Booking::where('id', 'LIKE', "%{$this->order}%")->where('alias_location_from', 'LIKE', "%{$this->fromLocation}%")->where('alias_location_to', 'LIKE', "%{$this->toLocation}%")->where('fullname', 'LIKE', "%{$this->name}%")->where('email', 'LIKE', "%{$this->email}%")->whereBetween('arrival_date', [$this->fromDate2, $this->toDate2])->where('status', 'paid')->count();

        }else {
            $this->bookingsCount = Booking::where('id', 'LIKE', "%{$this->order}%")->where('alias_location_from', 'LIKE', "%{$this->fromLocation}%")->where('alias_location_to', 'LIKE', "%{$this->toLocation}%")->where('fullname', 'LIKE', "%{$this->name}%")->where('email', 'LIKE', "%{$this->email}%")->count();
            $this->pendingCount = Booking::where('id', 'LIKE', "%{$this->order}%")->where('alias_location_from', 'LIKE', "%{$this->fromLocation}%")->where('alias_location_to', 'LIKE', "%{$this->toLocation}%")->where('fullname', 'LIKE', "%{$this->name}%")->where('email', 'LIKE', "%{$this->email}%")->where('status', 'pending')->count();
            $this->paidCount = Booking::where('id', 'LIKE', "%{$this->order}%")->where('alias_location_from', 'LIKE', "%{$this->fromLocation}%")->where('alias_location_to', 'LIKE', "%{$this->toLocation}%")->where('fullname', 'LIKE', "%{$this->name}%")->where('email', 'LIKE', "%{$this->email}%")->where('status', 'paid')->count();
            $this->fromDate2 = date('Y-m-d', strtotime(Booking::min('arrival_date')));
            $this->toDate2 = date('Y-m-d', strtotime(Booking::max('arrival_date')));

        }

        return view('livewire.bookings', [
            'bookings' => Booking::where('id', 'LIKE', "%{$this->order}%")->where('alias_location_from', 'LIKE', "%{$this->fromLocation}%")->where('alias_location_to', 'LIKE', "%{$this->toLocation}%")->where('fullname', 'LIKE', "%{$this->name}%")->where('email', 'LIKE', "%{$this->email}%")->whereBetween('arrival_date', [$this->fromDate2, $this->toDate2])->latest()->paginate($this->perPage),
        ]);

        
    }

    public function cleanFields()
    {
       $this->order = '';
       $this->name = '';
       $this->email = '';
       $this->arrivalDate = '';
       $this->fromDate = '';
       $this->toDate = '';
       $this->fromDate2 = '';
       $this->toDate2 = '';
       $this->pending = '';
       $this->paid = '';
       $this->perPage = 15;
       $this->locations = '';
       $this->fromLocation = '';
       $this->toLocation = '';
    }

}
