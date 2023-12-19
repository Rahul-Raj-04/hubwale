<?php

namespace App\Http\Controllers\Erp\Consultant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProvisionalInvoice;
use App\Models\Service;
use App\Models\Account;
use App\Models\User;
use App\Enum\Enum;

class ProvisionalInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provisionalInvoices = ProvisionalInvoice::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.consultant.provisional-invoice.index', compact('provisionalInvoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('erp.consultant.provisional-invoice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provisionalInvoice = ProvisionalInvoice::find($id);
        $particulars = Service::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $accounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $invoiceTypes = Enum::PROVISIONAL_INVOICE_TYPES;

        return view('erp.consultant.provisional-invoice.edit', compact('particulars', 'invoiceTypes', 'accounts', 'provisionalInvoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'account_id'    =>  'required',
            'invoice_type'  =>  'required',
            'bill_no'       =>  'required',
            'bill_date'     =>  'required',
            'particulars'   =>  'required',
            'amount'        =>  'required',
        ]);

        $provisionalInvoice = ProvisionalInvoice::find($id);

        $provisionalInvoice->account_id    =  $request->account_id;
        $provisionalInvoice->invoice_type  =  $request->invoice_type;
        $provisionalInvoice->bill_no       =  $request->bill_no;
        $provisionalInvoice->bill_date     =  $request->bill_date;
        $provisionalInvoice->particulars   =  $request->particulars;
        $provisionalInvoice->amount        =  $request->amount;

        $provisionalInvoice->save();

        toast('Provisional Invoice updated successfully!', 'success');
        return redirect()->route('erp.consultant.provisional-invoice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provisionalInvoice = ProvisionalInvoice::find($id);
        $provisionalInvoice->delete();

        toast('Provisional Invoice deleted successfully!', 'success');
        return redirect()->route('erp.consultant.provisional-invoice.index');        
    }

    public function updateIsAudit(Request $request)
    {
        $provisionalInvoice = ProvisionalInvoice::find($request->id);
        if ($provisionalInvoice) {
            $provisionalInvoice->is_audit = $request->is_audit;
            $provisionalInvoice->save();
            return response()->json(["success" => true]);
        }
    }
}
