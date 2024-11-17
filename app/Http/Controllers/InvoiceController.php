<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function show($id)
    {
        $bill = Bill::with('billItems.item')->findOrFail($id);
        return view('invoices.show', compact('bill'));
    }
}
