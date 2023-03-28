<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Traits\TestTrait;
use App\Models\Invoices;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    use TestTrait;
    public function index(){
        $invoices=Invoices::all();

        return $this->apiResponse($invoices,'ok',200);
    }
}
