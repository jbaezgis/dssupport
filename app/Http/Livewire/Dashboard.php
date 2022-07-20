<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use Carbon\Carbon;
use App\Models\Booking;
use App\Models\ActivityLog;
use Illuminate\Support\Str;

class Dashboard extends Component
{
    protected $queryString = [
        'fromDate' => ['except' => ''],
        'toDate' => ['except' => '']
    ];

    public $fromDate = '';
    public $toDate = '';
    public $pending = '';
    public $paid = '';
    public $today;
    // Logs
    public $logs, $logsViewForm, $logsSendRequest, $logsFromAndroid, $logsFromIphone, $logsFromPC;
    // Bookings counts
    public $bookingsTodayCount, $bookingsThisWeekCount, $bookingsThisMonthCount, $bookingsThisYearCount;
    // Bookings pending sum
    public $bookingsTodaySum, $bookingsThisWeekSum, $bookingsThisMonthSum, $bookingsThisYearSum;
    // Bookings paid sum
    public $bookingsTodayPaidSum, $bookingsThisWeekPaidSum, $bookingsThisMonthPaidSum, $bookingsThisYearPaidSum;


    public function render()
    {
        $this->today = Carbon::today()->format('d M Y');

        $this->bookings = Booking::whereDate('created_at', Carbon::now())->get();

        // Today
        $this->bookingsTodayCount = Booking::whereDate('created_at', Carbon::now())->count();
        $this->bookingsTodaySum = Booking::where('status', 'pending')->whereDate('created_at', Carbon::now())->sum('order_total');
        $this->bookingsTodayPaidSum = Booking::where('status', 'paid')->whereDate('created_at', Carbon::now())->sum('order_total');

        // This week
        $this->bookingsThisWeekCount = Booking::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $this->bookingsThisWeekSum = Booking::where('status', 'pending')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('order_total');
        $this->bookingsThisWeekPaidSum = Booking::where('status', 'paid')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('order_total');

        // This this month
        $this->bookingsThisMonthCount = Booking::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
        $this->bookingsThisMonthSum = Booking::where('status', 'pending')->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('order_total');
        $this->bookingsThisMonthPaidSum = Booking::where('status', 'paid')->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('order_total');

        // This this month
        $this->bookingsThisYearCount = Booking::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->count();
        $this->bookingsThisYearSum = Booking::where('status', 'pending')->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('order_total');
        $this->bookingsThisYearPaidSum = Booking::where('status', 'paid')->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('order_total');

        // $this->logsFromAndroid = ActivityLog::where('user_agent', 'LIKE', '%'.'Android'.'%')->whereDate('created_at', Carbon::now())->count();
        // $this->logsFromIphone = ActivityLog::where('user_agent', 'LIKE', '%'.'Iphone'.'%')->whereDate('created_at', Carbon::now())->count();
        // $this->logsFromPC = ActivityLog::where('user_agent', 'LIKE', '%'.'Windows'.'Macintosh'.'%')->whereDate('created_at', Carbon::now())->count();
        // $this->logsFromMac = ActivityLog::where('user_agent', 'LIKE',)->whereDate('created_at', Carbon::now())->count();


        return view('livewire.dashboard');
    }
}
