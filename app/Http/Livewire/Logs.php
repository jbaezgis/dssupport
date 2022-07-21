<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ActivityLog;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use Carbon\Carbon;

class Logs extends Component
{
    use WithPagination;
    use Actions;

    
    protected $queryString = [
        'search' => ['except' => ''],
        'fromDate' => ['except' => ''],
        'toDate' => ['except' => ''],
    ];
    
    public $fromDate;
    public $toDate;
    public $fromDate2 = '';
    public $toDate2 = '';
    public $search;
    public $logFromMobile, $logFromPC;
    public $today, $todayRequest, $thisMonth, $thisMonthRequest, $todayMobile, $todayPC, $thisMonthMobile, $thisMonthPC;
    public $todayPercentage, $thisMonthPercentage;
    
    public function mount()
    {
        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->search = '';
    }

    public function render()
    {
        $today = Carbon::today();

        if (!empty($this->fromDate and $this->toDate))
        {
            // $this->logFromMobile = ActivityLog::whereBetween('created_at', [$this->fromDate, $this->toDate])->where('user_agent', 'LIKE', '%'.'Mobile'.'%')->count();
            // $this->logFromPC = ActivityLog::whereBetween('created_at', [$this->fromDate, $this->toDate])->where('user_agent', 'LIKE', '%'.'Windows'.'%')->count();
            $this->fromDate2 = $this->fromDate;
            $this->toDate2 = $this->toDate;


        }elseif(!empty($this->fromDate))
        {
            // $this->logFromMobile = ActivityLog::whereBetween('created_at', [$this->fromDate, $this->toDate])->where('user_agent', 'LIKE', '%'.'Mobile'.'%')->count();
            // $this->logFromPC = ActivityLog::whereBetween('created_at', [$this->fromDate, $this->toDate])->where('user_agent', 'LIKE', '%'.'Windows'.'%')->count();
            $this->fromDate2 = $this->fromDate;
            $this->toDate2 = $today;


        }elseif(!empty($this->toDate))
        {
            $this->fromDate2 = date('Y-m-d', strtotime(ActivityLog::min('created_at')));
            $this->toDate2 = $this->toDate;
            // $this->logFromMobile = ActivityLog::whereBetween('created_at', [$this->fromDate, $this->toDate])->where('user_agent', 'LIKE', '%'.'Mobile'.'%')->count();
            // $this->logFromPC = ActivityLog::whereBetween('created_at', [$this->fromDate, $this->toDate])->where('user_agent', 'LIKE', '%'.'Windows'.'%')->count();

        }else {
            // $this->logFromMobile = ActivityLog::whereBetween('created_at', [$this->fromDate, $this->toDate])->where('user_agent', 'LIKE', '%'.'Mobile'.'%')->count();
            // $this->logFromPC = ActivityLog::whereBetween('created_at', [$this->fromDate, $this->toDate])->where('user_agent', 'LIKE', '%'.'Windows'.'%')->count();
            $this->fromDate2 = date('Y-m-d', strtotime(ActivityLog::min('created_at')));
            $this->toDate2 = date('Y-m-d', strtotime(ActivityLog::max('created_at')));
        }

        $this->today = ActivityLog::whereDate('created_at', Carbon::now())->count();
        $this->todayRequest = ActivityLog::whereDate('created_at', Carbon::now())->where('action', 'Request sent')->count();
        // $this->todayMobile = ActivityLog::whereDate('created_at', Carbon::now())->where('user_agent', 'LIKE', '%'.'Mobile'.'%')->count();
        // $this->todayPC = ActivityLog::whereDate('created_at', Carbon::now())->where('user_agent', 'LIKE', '%'.'Windows'.'%')->count();
        $this->todayPercentage = ($this->todayRequest / $this->today) * 100;

        
        $this->thisMonth = ActivityLog::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
        $this->thisMonthRequest = ActivityLog::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('action', 'Request sent')->count();
        // $this->thisMonthMobile = ActivityLog::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('user_agent', 'LIKE', '%'.'Mobile'.'%')->count();
        // $this->thisMonthPC = ActivityLog::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('user_agent', 'LIKE', '%'.'Windows'.'%')->count();
        $this->thisMonthPercentage = ($this->thisMonthRequest / $this->thisMonth) * 100;

        return view('livewire.logs', [
            'logs' => ActivityLog::where('user_agent', 'LIKE', "%{$this->search}%")->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->latest()->paginate(25),
        ]);
    }
}
