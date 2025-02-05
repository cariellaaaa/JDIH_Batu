<?php

namespace App\Http\Controllers;

use App\Charts\ProkumChart;
use App\Models\ProdukHukum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function GrafikProkum (ProkumChart $chart) {
        $data['chart'] = $chart->build();
        
        return view('JDIH.statistikprokum', $data);
    }

    public function GrafikBeranda (ProkumChart $chart) {
        $data['chart'] = $chart->build();

        return view('JDIH.beranda', $data);
    }
}
