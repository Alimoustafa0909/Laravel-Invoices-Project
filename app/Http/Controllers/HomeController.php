<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $count_all =Invoices::count();
        $count_invoices1 = Invoices::where('Value_Status', 1)->count();
        $count_invoices2 = Invoices::where('Value_Status', 2)->count();
        $count_invoices3 = Invoices::where('Value_Status', 3)->count();

        if($count_invoices2 == 0){
            $nspainvoices2=0;
        }
        else{
            $nspainvoices2 = $count_invoices2/ $count_all*100;
        }

        if($count_invoices1 == 0){
            $nspainvoices1=0;
        }
        else{
            $nspainvoices1 = $count_invoices1/ $count_all*100;
        }

        if($count_invoices3 == 0){
            $nspainvoices3=0;
        }
        else{
            $nspainvoices3 = $count_invoices3/ $count_all*100;
        }


        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 350, 'height' => 200])
            ->labels(['Unpaid Invoices', 'Paid Invoices','Partially Paid Invoices'])
            ->datasets([
                [
                    "label" => "Unpaid Invoices",
                    'backgroundColor' => ['#ec5858'],
                    'data' => [$nspainvoices2]
                ],
                [
                    "label" => "Paid Invoices",
                    'backgroundColor' => ['#81b214'],
                    'data' => [$nspainvoices1]
                ],
                [
                    "label" => "Partially Paid ",
                    'backgroundColor' => ['#ff9642'],
                    'data' => [$nspainvoices3]
                ],


            ])
            ->options([]);
        return view('dashboard',compact('chartjs'));
    }
}
