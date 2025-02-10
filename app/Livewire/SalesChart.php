<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SalesChart extends Component
{
    public $sales;
    public function render()
    {
        $sales = Transaksi::selectRaw("SUM(total) as total, MONTH(tgl_pesan) as month")
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Membuat chart menggunakan data dari database
        $chart = (new LarapexChart)->lineChart()
            ->setTitle('Monthly Sales')
            ->addData('Sales', array_values($sales))
            ->setXAxis(array_keys($sales));

        return view('livewire.sales-chart', [
            'chart' => $chart
        ]);
    }
}
