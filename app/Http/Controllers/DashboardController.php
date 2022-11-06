<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        // Count data Ondelivery
        $onDelivery = Transaction::where('status', 'ON_DELIVERY')->count();
        // Count data Success
        $success = Transaction::where('status', 'SUCCESS')->count();
        // Count data Cancelled
        $cancelled = Transaction::where('status', 'CANCELLED')->count();

        // Start date for chart
        $startTimeStamp = strtotime(Carbon::now()->addDays(1)->format('Y-m-d'));
        $endTimeStamp = strtotime(request()->get('date') ?? Carbon::now()->subDays(6)->format('Y-m-d'));

        $timeDiff = abs($endTimeStamp - $startTimeStamp);

        $numberDays = $timeDiff / 86400;  // 86400 seconds in one day

        $dayRequest = intval($numberDays);

        // Laporan Harian
        $day = [];
        $date = [];
        for ($i = 0; $i < $dayRequest; $i++) {
            $dateNow = Carbon::now()->subDays($i)->format('Y-m-d');
            $date[] = $dateNow;
            $day[] = Transaction::whereDate('created_at', $dateNow)->where('status', 'SUCCESS')->sum('total');
        }

        // Laporan Bulanan
        // monthly
        $month = [];
        $monthNow = Carbon::now()->addMonth(1)->format('m');
        $monthRequest = request()->get('month') ?? Carbon::now()->subMonth(2)->format('m');
        $countMonth = $monthNow - $monthRequest > 0 ? $monthNow - $monthRequest : 12 - $monthRequest + $monthNow;
        for ($i = 0; $i < $countMonth; $i++) {
            $month[] = Carbon::now()->subMonths($i)->format('F');
            $monthNow = Carbon::now()->subMonths($i)->format('m');
            $monthIn[] = Transaction::whereMonth('created_at', $monthNow)->whereYear('created_at', date('Y'))->where('status', 'SUCCESS')->sum('total');
        }

        $dayTransaction  = (new LarapexChart)->areaChart()
            ->setTitle('Laporan Transaction SUCCESS (' . $dayRequest . ' Hari Terakhir)')
            ->setSubtitle($dayRequest . '  Hari Terakhir')
            ->addData('Transaction SUCCESS ', $day)
            ->setXAxis($date);

        $monthTransaction = (new LarapexChart)->barChart()
            ->setTitle('Laporan Transaction SUCCESS.')
            ->setSubtitle($countMonth . ' Bulan Terakhir')
            ->addData('Transaction SUCCESS ', $monthIn)
            ->setXAxis($month);

        return view('dashboard', compact('onDelivery', 'success', 'cancelled', 'dayTransaction', 'monthTransaction'));
    }
}
