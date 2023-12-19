<?php

namespace App\Http\Controllers\Erp\Consultant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DirectInvoice;
use App\Models\Service;
use App\Models\Account;
use App\Models\User;
use App\Enum\Enum;

class DirectInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directInvoices = DirectInvoice::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.consultant.direct-invoice.index', compact('directInvoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('erp.consultant.direct-invoice.create');
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
        return view('erp.consultant.direct-invoice.edit', compact('id'));
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
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $directInvoice = DirectInvoice::find($id);
        $directInvoice->delete();

        toast('Direct Invoice deleted successfully!', 'success');
        return redirect()->route('erp.consultant.direct-invoice.index');        
    }

    public function updateIsAudit(Request $request)
    {
        $directInvoice = DirectInvoice::find($request->id);
        if ($directInvoice) {
            $directInvoice->is_audit = $request->is_audit;
            $directInvoice->save();
            return response()->json(["success" => true]);
        }
    }
}
