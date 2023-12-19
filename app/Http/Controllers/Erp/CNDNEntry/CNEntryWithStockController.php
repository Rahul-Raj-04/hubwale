<?php

namespace App\Http\Controllers\Erp\CNDNEntry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CNDNEntry;
use App\Models\Account;
use App\Models\GstCommodity;
use App\Enum\Enum;
use App\Models\CurrencyMaster;
use App\Models\Service;
use Spatie\QueryBuilder\QueryBuilder;

class CNEntryWithStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cnEntryWithStocks = CNDNEntry::where('model_name', Enum::CN_ENTRY_WITH_STOCK)->where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get()->groupBy('group_id');
        return view('erp.transactions.cn-dn-entry.cn-entry-with-stock.index')->with(compact('cnEntryWithStocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('erp.transactions.cn-dn-entry.cn-entry-with-stock.create');
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
        $cnEntryWithStock = CNDNEntry::find($id);
        return view('erp.transactions.cn-dn-entry.cn-entry-with-stock.edit')->with(compact('cnEntryWithStock'));
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
        $cnEntryWithStocks = CNDNEntry::where('group_id', $group_id)->get();
        foreach ($cnEntryWithStocks as $key => $cnEntryWithStock) {
            $cnEntryWithStock->delete();
        }
        toast('CN entry with stock deleted successfully!', 'success');
        return redirect()->route('erp.account-transaction.cn-dn-entry.cn-entry-with-stock.index');
    }

    public function updateIsAudit(Request $request)
    {
        $cnEntryWithStocks = CNDNEntry::where('group_id', $request->group_id)->get();
        foreach ($cnEntryWithStocks as $key => $cnEntryWithStock) {
            $cnEntryWithStock->is_audit = $request->is_audit;
            $cnEntryWithStock->save();
        }
        return response()->json(["success" => true]);
    }

    public function filter(Request $request)
    {
        $cnEntryWithStocks = QueryBuilder::for(CNDNEntry::class)->allowedFilters(['vou_date', 'voucher_no', 'doc_no', 'doc_date', 'party_account.name', 'effect', 'reason'])->where('model_name', Enum::CN_ENTRY_WITH_STOCK)->where('company_id', auth()->user()->company->id)->get()->groupBy('group_id');
        return view('erp.transactions.cn-dn-entry.cn-entry-with-stock.index')->with(compact('cnEntryWithStocks'));
    }
}
