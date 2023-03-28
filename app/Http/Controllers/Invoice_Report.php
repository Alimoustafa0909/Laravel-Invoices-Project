<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Sections;
use Illuminate\Http\Request;

class Invoice_Report extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function Invoice_Search(Request $request)
    {

        if ($request->rdio == 1) {

            // in case of not detrminig date
            if ($request->invoice_type && $request->Start_date == '' && $request->End_date == '') {

                $invoices = Invoices::select('*')->where('Status', '=', $request->invoice_type)->get();
                $invoice_type = $request->invoice_type;
                return view('reports.index', compact('invoice_type'))->withDetails($invoices);
            } else {

                $Start_date = date($request->Start_date);
                $End_date = date($request->End_date);
                $invoice_type = $request->invoice_type;

                $invoices = Invoices::whereBetween('invoice_Date', [$Start_date, $End_date])->where('Status', '=', $request->invoice_type)->get();
                return view('reports.index', compact('invoice_type', 'Start_date', 'End_date'))->withDetails($invoices);

            }
        } else {
            $invoice = Invoices::where('invoice_number', '=', $request->invoice_number)->get();
            return view('reports.index')->withDetails($invoice);
        }
    }

    public function User_reports()
    {
        $sections = Sections::all();
        return view('reports.user_report', compact('sections'));
    }

///////////////////////////////////////////////////////////
///
///
    public function Search_user_reports(Request $request)
    {
        $sections = Sections::all();
        //there is no date
        if ( $request->Section  &&  $request->porduct && $request->Start_date == '' && $request->End_date == '') {
            $invoices = Invoices::select('*')->where('section_id', '=', $request->Section)->where('product', '=', $request->product)->get();
            return view('reports.user_report' ,compact('sections'))->withDetails($invoices);
        }

        else {

            $Start_date = date($request->Start_date);
            $End_date = date($request->End_date);
            $sections = Sections::all();

            $invoices =Invoices::wherebetween('invoice_Date', [$Start_date, $End_date])->where('section_id','=',$request->Section)->where('product', '=', $request->product)->get();
            return view('reports.user_report',compact('sections'))->withDetails($invoices);
        }


    }

}
