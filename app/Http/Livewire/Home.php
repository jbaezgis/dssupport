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

class Home extends Component
{
    protected $queryString = [
        'type' => ['except' => ''],
        'fromLocation' => ['except' => ''],
        'toLocation' => ['except' => '']
    ];

    public $title; 
    public $fromLocation = '';
    public $toLocation = '';
    public $services = '';
    public $locAlias = '';
    public $type = '';
    
    public function render()
    {
        $this->locAlias = LocationAlias::orderBy('order_number', 'ASC')->get();
        $this->services = Service::where('from', $this->fromLocation)->where('to', $this->toLocation)->get();
        return view('livewire.home')->layout('layouts/mobile');
    }
}
