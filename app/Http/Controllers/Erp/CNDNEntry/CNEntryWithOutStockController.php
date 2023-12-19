<?php

namespace App\Http\Controllers\Erp\CNDNEntry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CNDNEntry;
use App\Models\Account;
use App\Models\GstCommodity;
use App\Enum\Enum;
use Spatie\QueryBuilder\QueryBuilder;

class CNEntryWithOutStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cnEntryWithOutStocks = CNDNEntry::where('model_name', Enum::CN_ENTRY_W_O_STOCK)->where('company_id', auth()->user()->company->id)->get()->groupBy('group_id');
        return view('erp.transactions.cn-dn-entry.cn-entry-with-out-stock.index')->with(compact('cnEntryWithOutStocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('erp.transactions.cn-dn-entry.cn-entry-with-out-stock.create');
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
        $cnEntryWithOutStock = CNDNEntry::find($id);
        return view('erp.transactions.cn-dn-entry.cn-entry-with-out-stock.edit')->with(compact('cnEntryWithOutStock'));
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
        $cnEntryWithOutStocks = CNDNEntry::where('group_id', $group_id)->get();
        foreach ($cnEntryWithOutStocks as $key => $cnEntryWithOutStock) {
            $cnEntryWithOutStock->delete();
        }

        toast('CN entry w/o stock deleted successfully!', 'success');
        return redirect()->route('erp.account-transaction.cn-dn-entry.cn-entry-with-out-stock.index');
    }

    public function updateIsAudit(Request $request)
    {
        $cnEntryWithOutStocks = CNDNEntry::where('group_id', $request->group_id)->get();
        foreach ($cnEntryWithOutStocks as $key => $cnEntryWithOutStock) {
            $cnEntryWithOutStock->is_audit = $request->is_audit;
            $cnEntryWithOutStock->save();
        }
        return response()->json(["success" => true]);
    }

    public function filter(Request $request)
    {
        $cnEntryWithOutStocks = QueryBuilder::for(CNDNEntry::class)->allowedFilters(['vou_date', 'voucher_no', 'doc_no', 'doc_date', 'party_account.name', 'effect', 'reason'])->where('model_name', Enum::CN_ENTRY_W_O_STOCK)->where('company_id', auth()->user()->company->id)->get()->groupBy('group_id');
        return view('erp.transactions.cn-dn-entry.cn-entry-with-out-stock.index')->with(compact('cnEntryWithOutStocks'));
    }
}
