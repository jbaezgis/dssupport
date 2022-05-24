<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use App\Models\Booking;
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
        'perPage' => ['except' => '']
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

    public function render()
    {
        $today = Carbon::today();
        
        if (!empty($this->fromDate and $this->toDate))
        {
            $this->bookingsCount = Booking::whereBetween('arrival_date', [$this->fromDate, $this->toDate])->count();
            $this->pendingCount = Booking::whereBetween('arrival_date', [$this->fromDate, $this->toDate])->where('status', 'pending')->count();
            $this->paidCount = Booking::whereBetween('arrival_date', [$this->fromDate, $this->toDate])->where('status', 'paid')->count();
            $this->fromDate2 = $this->fromDate;
            $this->toDate2 = $this->toDate;

        }elseif(!empty($this->fromDate))
        {
            $this->bookingsCount = Booking::whereBetween('arrival_date', [$this->fromDate, $today])->count();
            $this->pendingCount = Booking::whereBetween('arrival_date', [$this->fromDate, $today])->where('status', 'pending')->count();
            $this->paidCount = Booking::whereBetween('arrival_date', [$this->fromDate, $today])->where('status', 'paid')->count();
            $this->fromDate2 = $this->fromDate;
            $this->toDate2 = $today;

        }else {
            $this->bookingsCount = Booking::count();
            $this->pendingCount = Booking::where('status', 'pending')->count();
            $this->paidCount = Booking::where('status', 'paid')->count();
            $this->fromDate2 = date('Y-m-d', strtotime(Booking::min('arrival_date')));
            $this->toDate2 = date('Y-m-d', strtotime(Booking::max('arrival_date')));

        }

        return view('livewire.bookings', [
            'bookings' => Booking::where('id', 'LIKE', "%{$this->order}%")->where('fullname', 'LIKE', "%{$this->name}%")->where('email', 'LIKE', "%{$this->email}%")->whereBetween('arrival_date', [$this->fromDate2, $this->toDate2])->latest()->paginate($this->perPage),
        ]);
    }

    

}
