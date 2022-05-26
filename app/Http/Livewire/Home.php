<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use App\Models\Booking;
use Carbon\Carbon;

class Home extends Component
{
    public $title; 
    
    public function render()
    {
        return view('livewire.home');
    }
}
