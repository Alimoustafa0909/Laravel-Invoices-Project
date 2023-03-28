<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\invoices_attachment;
use App\Models\invoices_details;
use App\Models\Products;
use App\Models\Sections;
use App\Models\User;
use App\Notifications\InvoicePaid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoices::all();
        return view('invoicess.InvoicesList', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Sections::all();
        $products = Products::all();

        return view('invoicess.InvoiceAdd', compact('sections', 'products'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Invoices::create([

            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'Status' => 'not paid',
            'Value_Status' => 2,
            'note' => $request->note,
        ]);
        $id_invoice = Invoices::latest()->first()->id;
        invoices_details::create([
            'id_Invoice' => $id_invoice,
            'invoice_number' => $request->invoice_number,
            'product' => $request->product,
            'Section' => $request->Section,
            'Status' => 'not paid',
            'Value_Status' => 2,
            'note' => $request->note,
            'user' => Auth::user()->name,

        ]);

        if ($request->hasFile('pic')) {

            $invoice_id = Invoices::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $invoice_number = $request->invoice_number;

            $attachments = new invoices_attachment();
            $attachments->file_name = $file_name;
            $attachments->invoice_number = $invoice_number;
            $attachments->Created_by = Auth::user()->name;
            $attachments->invoice_id = $invoice_id;
            $attachments->save();

            // move pic
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachments/' . $invoice_number), $imageName);



        }
        $users=User::get();
        Notification::send($users, new InvoicePaid($id_invoice));

        return redirect()->route('invoice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Invoices $invoices
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoices::where('id', $id)->first();
        $sections = Sections::all();
        return view('invoicess.InvoicePaymentStatues', compact('invoice', 'sections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Invoices $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoices::where('id', $id)->first();
        $sections = Sections::all();
        return view('invoicess.InvoiceEdit', compact('invoice', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invoices $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Invoices::findOrFail($request->id)->update([
            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'note' => $request->note,
        ]);
        return redirect()->route('invoice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Invoices $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        Invoices::findorfail($request->id)->forcedelete();
        return redirect()->route('invoice.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function archive(Request $request)
    {

        Invoices::findorfail($request->invoice_id)->delete();
        return redirect()->route('invoice.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function get_products($id)
    {
        $products = DB::table('products')->where('section_id', $id)->pluck('product_name', 'id');
        return json_encode($products);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function ChangeStatus(Request $request)
    {
        $invoice = Invoices::findorfail($request->id);
        if ($request->Status == 'paid') {

            $invoice->update([
                'Value_Status' => 1,
                'Status' => $request->Status,
                'Payment_Date' => $request->Payment_Date,

            ]);

            invoices_details::create([
                'id_Invoice' => $request->id,
                'invoice_number' => $request->invoice_number,
                'product' => $request->product,
                'Section' => $request->Section,
                'Status' => $request->Status,
                'Value_Status' => 1,
                'note' => $request->note,
                'Payment_Date' => $request->Payment_Date,
                'user' => (Auth::user()->name),
            ]);
        } else if (($request->Status == 'not paid') ) {
            $invoice->update([
                'Value_Status' => 2,
                'Status' => $request->Status,
                'Payment_Date' => $request->Payment_Date,

            ]);
            invoices_Details::create([
                'id_Invoice' => $request->id,
                'invoice_number' => $request->invoice_number,
                'product' => $request->product,
                'Section' => $request->Section,
                'Status' => $request->Status,
                'Value_Status' => 3,
                'note' => $request->note,
                'Payment_Date' => $request->Payment_Date,
                'user' => (Auth::user()->name),
            ]);

        }  else {
                $invoice->update([
                    'Value_Status' => 3,
                    'Status' => $request->Status,
                    'Payment_Date' => $request->Payment_Date,

                ]);
                invoices_Details::create([
                    'id_Invoice' => $request->id,
                    'invoice_number' => $request->invoice_number,
                    'product' => $request->product,
                    'Section' => $request->Section,
                    'Status' => $request->Status,
                    'Value_Status' => 3,
                    'note' => $request->note,
                    'Payment_Date' => $request->Payment_Date,
                    'user' => (Auth::user()->name),
                ]);





            }
        return redirect()->route('invoice.index');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function PaidInvoice()
    {
        $invoices = Invoices::all();
        return view('invoicess.PaidInvoices', compact('invoices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function UnpaidInvoice()
    {
        $invoices = Invoices::all();
        return view('invoicess.UnpaidInvoice', compact('invoices'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     */

    public function PartialyPaidInvoice()
    {
        $invoices = Invoices::all();
        return view('invoicess.PartialyPaidInvoice', compact('invoices'));
    }

    public function Print_invoice($id)
    {
        $invoice=Invoices::where('id',$id)->first();
        return view('invoicess.Invoice_print',compact('invoice'));
    }
}
