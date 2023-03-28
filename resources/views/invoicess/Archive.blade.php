@extends('layouts.master')
@section('title')
    Invoice WebSite
@endsection
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">invoice_No</th>
                                <th class="border-bottom-0">invoice_DT</th>
                                <th class="border-bottom-0">due_Dt</th>
                                <th class="border-bottom-0">product</th>
                                <th class="border-bottom-0">section</th>
                                <th class="border-bottom-0">discount</th>
                                <th class="border-bottom-0">Rate_V</th>
                                <th class="border-bottom-0">total</th>
                                <th class="border-bottom-0">status</th>
                                <th class="border-bottom-0">note</th>
                                <th class="border-bottom-0">Process</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trashed as $invoice)
                                <tr>
                                    <th class="border-bottom-0"><a href="{{url('InvoiceDetails')}}/{{$invoice->id}}">{{$invoice->invoice_number}}</a></th>
                                    <th class="border-bottom-0">{{$invoice->invoice_Date}}</th>
                                    <th class="border-bottom-0">{{$invoice->Due_date}}</th>
                                    <th class="border-bottom-0">{{$invoice->product}}</th>
                                    <th class="border-bottom-0">{{$invoice->section->section_name}} </th>
                                    <th class="border-bottom-0">{{$invoice->Discount}}</th>
                                    <th class="border-bottom-0">{{$invoice->Rate_VAT}}</th>
                                    <th class="border-bottom-0">{{$invoice->Total}}</th>
                                    <th class="border-bottom-0">
                                        @if($invoice->Value_Status==1)
                                            <span class="text-success">{{ $invoice->Status }}</span>
                                        @elseif($invoice->Value_Status==2)
                                            <span class="text-danger">{{ $invoice->Status }}</span>
                                        @else
                                            <span class="text-orange">{{ $invoice->Status }}</span>
                                        @endif


                                    </th>
                                    <th class="border-bottom-0">{{$invoice->note}}</th>
                                    <th class="border-bottom-0">

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle  btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Process
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" data-invoice_id="{{ $invoice->id }}"
                                                   data-toggle="modal" data-target="#Delete_Archive_invoice"><i
                                                            class="text-warning fas fa-inline-danger-alt"></i>Delete</a>

                                                <a class="dropdown-item" data-invoice_id="{{ $invoice->id }}"
                                                   data-toggle="modal" data-target="#Restore_invoice"><i
                                                            class="text-warning fas fa-exchange-alt"></i>restore</a>

                                            </div>
                                        </div>
                                    </th>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>

    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    @include('modals.Delete_Archive_InvoiceModal')
    @include('modals.Restore_invoice')
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <script>
        $('#Delete_Archive_invoice').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })
    </script>

    <script>
        $('#Restore_invoice').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })
    </script>
@endsection
