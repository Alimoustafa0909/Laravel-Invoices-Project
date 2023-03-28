@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
     <div class="card" id="basic-alert">
       <div class="card-body">
      <div>
 <h6 class="card-title mb-1">Inovice</h6>

    </div>
           <div class="text-wrap">
               <div class="example">
                   <div class="panel panel-primary tabs-style-1">
                       <div class=" tab-menu-heading">
                           <div class="tabs-menu1">
                               <!-- Tabs -->
                               <ul class="nav panel-tabs main-nav-line">
                                   <li class="nav-item"><a href="#tab1" class="nav-link active"
                                                           data-toggle="tab">Invoice</a></li>
                                   <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">Invoice
                                           details</a></li>
                                   <li class="nav-item"><a href="#tab3" class="nav-link" data-toggle="tab">Invoice
                                           attachment</a></li>
                               </ul>
                           </div>
                       </div>
                       <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">

                           <div class="tab-content">
                               <div class="tab-pane active" id="tab1">

                                   <table class="table text-md-nowrap" id="example1">
                                       <thead>
                                       <tr>
                                           <th class="border-bottom-0">invoice_number</th>
                                           <th class="border-bottom-0">invoice_date</th>
                                           <th class="border-bottom-0">due_date</th>
                                           <th class="border-bottom-0">product</th>
                                           <th class="border-bottom-0">section</th>
                                           <th class="border-bottom-0">discount</th>
                                           <th class="border-bottom-0">value_vat</th>
                                           <th class="border-bottom-0">Rate_VAT</th>
                                           <th class="border-bottom-0">total</th>
                                           <th class="border-bottom-0">status</th>
                                           <th class="border-bottom-0">value_status</th>
                                           <th class="border-bottom-0">note</th>
                                       </tr>
                                       </thead>
                                       <tbody>

                                       <tr>
                                           <th class="border-bottom-0">{{$invoice->invoice_number}}</th>
                                           <th class="border-bottom-0">{{$invoice->invoice_Date}}</th>
                                           <th class="border-bottom-0">{{$invoice->Due_date}}</th>
                                           <th class="border-bottom-0">{{$invoice->product}}</th>
                                           <th class="border-bottom-0">{{$invoice->section->section_name}}</a> </th>
                                           <th class="border-bottom-0">{{$invoice->Discount}}</th>
                                           <th class="border-bottom-0">{{$invoice->Value_VAT}}</th>
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
                                       </tr>
                                       </tbody>
                                   </table>

                               </div>


                               <div class="tab-pane" id="tab2">
                                   <table class="table text-md-nowrap" id="example1">
                                       <thead>
                                       <tr>
                                           <th class="border-bottom-0">id_Invoice</th>
                                           <th class="border-bottom-0">invoice_number</th>
                                           <th class="border-bottom-0">product</th>
                                           <th class="border-bottom-0">section</th>
                                           <th class="border-bottom-0">Status</th>
                                           <th class="border-bottom-0">Value_Status</th>
                                           <th class="border-bottom-0">Payment_Date</th>
                                           <th class="border-bottom-0">created_at</th>
                                           <th class="border-bottom-0">note</th>
                                           <th class="border-bottom-0">user</th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                       <?php $i = 0; ?>
                                       @foreach($invoice_details as $invoiceDetails)
                                           <?php $i++; ?>
                                           <tr>
                                               <th class="border-bottom-0">{{$i}}</th>
                                               <th class="border-bottom-0">{{$invoiceDetails->invoice_number}}</th>
                                               <th class="border-bottom-0">{{$invoiceDetails->product}}</th>
                                               <th class="border-bottom-0">{{$invoice->section->section_name}}</a> </th>
                                               @if ($invoiceDetails->Value_Status == 1)
                                                   <td><span
                                                               class="badge badge-pill badge-success">{{ $invoiceDetails->Status }}</span>
                                                   </td>
                                               @elseif($invoiceDetails->Value_Status ==2)
                                                   <td><span
                                                               class="badge badge-pill badge-danger">{{ $invoiceDetails->Status }}</span>
                                                   </td>
                                               @else
                                                   <td><span
                                                               class="badge badge-pill badge-warning">{{ $invoiceDetails->Status }}</span>
                                                   </td>
                                               @endif
                                               <th class="border-bottom-0">{{$invoiceDetails->Value_Status}}</th>
                                               <th class="border-bottom-0">{{$invoiceDetails->Payment_Date}}</th>
                                               <th class="border-bottom-0">{{$invoiceDetails->created_at}}</th>

                                               <th class="border-bottom-0">{{$invoiceDetails->note}}</th>
                                               <th class="border-bottom-0">{{$invoiceDetails->user}}</th>
                                           </tr>
                                       @endforeach
                                       </tbody>
                                   </table>

                               </div>
                               <div class="tab-pane" id="tab3">
                                   <table class="table text-md-nowrap" id="example1">
                                       <thead>
                                       <tr>

                                           <th class="border-bottom-0">file_name</th>
                                           <th class="border-bottom-0">Created_by</th>
                                           <th class="border-bottom-0">created_at</th>
                                           <th class="border-bottom-0"></th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                       <?php $i = 0; ?>
                                       @foreach($attachments as $attachment)
                                           <?php $i++; ?>
                                           <tr>
                                               <td>{{ $i }}</td>
                                               <td>{{ $attachment->file_name }}</td>
                                               <td>{{ $attachment->Created_by }}</td>
                                               <td>{{ $attachment->created_at }}</td>
                                               <td colspan="2">

                                                   <a class="btn btn-outline-success btn-sm"
                                                      href="{{ url('view_file') }}/{{ $invoice->invoice_number }}/{{ $attachment->file_name }}"
                                                      role="button"><i class="fas fa-eye"></i>&nbsp;
                                                       Show</a>

                                                   <a class="btn btn-outline-info btn-sm"
                                                      href="{{ url('get_file') }}/{{ $invoice->invoice_number }}/{{ $attachment->file_name }}"
                                                      role="button"><i
                                                               class="fas fa-download"></i>&nbsp;
                                                       Download</a>

                                                   @can('حذف المرفق')
                                                       <button class="btn btn-outline-danger btn-sm"
                                                               data-toggle="modal"
                                                               data-file_name="{{ $attachment->file_name }}"
                                                               data-invoice_number="{{ $attachment->invoice_number }}"
                                                               data-id_file="{{ $attachment->id }}"
                                                               data-target="#DeleteModal">Delete
                                                       </button>
                                                   @endcan

                                               </td>
                                           </tr>
                                       @endforeach
                                       </tbody>


                                   </table>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <!-- Prism Code -->
               <!-- End Prism Precode -->
           </div>
       </div>
            </div>
        </div>

        <!-- /div -->

    </div>
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    @include('modals.AttachmentDeleteModal')
    <!-- main-content closed -->
@endsection
@section('js')
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
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>
    <script>
        $('#DeleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)
            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })
    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

@endsection