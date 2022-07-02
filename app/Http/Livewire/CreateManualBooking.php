<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use App\Models\Booking;
use App\Models\Location;
use App\Models\LocationAlias;
use App\Models\Service;
use App\Models\ServicePrice;
use Carbon\Carbon;
use App\Http\Requests;

class CreateManualBooking extends Component
{
    protected $queryString = [
        // 'type' => ['except' => ''],
        'fromLocation' => ['except' => ''],
        'toLocation' => ['except' => ''],
        'arrivalDate' => ['except' => ''],
        'passengers' => ['except' => '']
    ];

    public $title; 
    public $fromLocation = '';
    public $locAliasFrom = '';
    public $toLocation = '';
    public $locAliasTo = '';
    public $service = '';
    public $sevicePrices = '';
    public $locAlias = '';
    public $arrivalDate = '';
    public $passengers = 1;

    public function render()
    {
        $this->locAlias = LocationAlias::orderBy('order_number', 'ASC')->get();
        $this->locAliasFrom = LocationAlias::where('id', $this->fromLocation)->first();
        $this->locAliasTo = LocationAlias::where('id', $this->toLocation)->first();
        if (!empty($this->fromLocation and $this->toLocation))
        {
            $this->service = Service::where('from', $this->locAliasFrom->location_id)->where('to', $this->locAliasTo->location_id)->first();
        }

        if($this->service)
        {
            $this->servicePrices = ServicePrice::where('service_id', $this->service->id)->where('status', 'Active')->whereHas('priceOption', function ($query) {
                $query->where('maxpassengers', '>=', $this->passengers);
            })->get();
        }

        return view('livewire.bookings.create-manual-booking');
    }
}
