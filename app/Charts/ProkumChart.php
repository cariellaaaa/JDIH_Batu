<?php

namespace App\Charts;

use App\Models\ProdukHukum;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ProkumChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Mengambil data produk hukum berdasarkan tahun
        $data = ProdukHukum::selectRaw('YEAR(tanggal_pengundangan) as tahun, COUNT(*) as jumlah')
            ->groupBy('tahun')
            ->orderBy('tahun', 'asc')
            ->get();

        // Memisahkan data untuk ditampilkan di chart
        $dataTahun = $data->pluck('tahun')->toArray();
        $dataJumlahProkum = $data->pluck('jumlah')->toArray();

        return $this->chart->barChart()
            ->addData('Jumlah Produk Hukum', $dataJumlahProkum)
            ->setXAxis($dataTahun);
    }
}
