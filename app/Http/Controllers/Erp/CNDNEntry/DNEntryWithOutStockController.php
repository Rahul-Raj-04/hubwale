<?php

namespace App\Http\Controllers\Erp\CNDNEntry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CNDNEntry;
use App\Models\Account;
use App\Models\GstCommodity;
use App\Enum\Enum;
use Spatie\QueryBuilder\QueryBuilder;

class DNEntryWithOutStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dnEntryWithOutStocks = CNDNEntry::where('model_name', Enum::DN_ENTRY_W_O_STOCK)->where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get()->groupBy('group_id');
        return view('erp.transactions.cn-dn-entry.dn-entry-with-out-stock.index')->with(compact('dnEntryWithOutStocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('erp.transactions.cn-dn-entry.dn-entry-with-out-stock.create');
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
        $dnEntryWithOutStock = CNDNEntry::where('model_name', Enum::DN_ENTRY_W_O_STOCK)->where('id', $id)->first();
        return view('erp.transactions.cn-dn-entry.dn-entry-with-out-stock.edit')->with(compact('dnEntryWithOutStock'));
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
    public function destroy($group_id)
    {
        $dnEntryWithOutStocks = CNDNEntry::where('group_id', $group_id)->get();
        foreach ($dnEntryWithOutStocks as $key => $dnEntryWithOutStock) {
            $dnEntryWithOutStock->delete();
        }

        toast('DN entry w/o stock deleted successfully!', 'success');
        return redirect()->route('erp.account-transaction.cn-dn-entry.dn-entry-with-out-stock.index');
    }

    public function updateIsAudit(Request $request)
    {
        $dnEntryWithOutStocks = CNDNEntry::where('group_id', $request->group_id)->get();
        foreach ($dnEntryWithOutStocks as $key => $dnEntryWithOutStock) {
            $dnEntryWithOutStock->is_audit = $request->is_audit;
            $dnEntryWithOutStock->save();
        }
        return response()->json(["success" => true]);
    }

    public function filter(Request $request)
    {
        $dnEntryWithOutStocks = QueryBuilder::for(CNDNEntry::class)->allowedFilters(['vou_date', 'voucher_no', 'doc_no', 'doc_date', 'party_account.name', 'effect', 'reason'])->where('model_name', Enum::DN_ENTRY_W_O_STOCK)->where('company_id', auth()->user()->company->id)->get()->groupBy('group_id');
        return view('erp.transactions.cn-dn-entry.dn-entry-with-out-stock.index')->with(compact('dnEntryWithOutStocks'));
    }
}
