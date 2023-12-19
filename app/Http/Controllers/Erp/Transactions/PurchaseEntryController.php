<?php

namespace App\Http\Controllers\Erp\Transactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enum\Enum;
use App\Models\PurchaseEntry;
use Spatie\QueryBuilder\QueryBuilder;

class PurchaseEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (in_array($request->type, Enum::PURCHASE_ENTRY_TYPE)) {
            $data = PurchaseEntry::Where([['type', $request->type], ['company_id', auth()->user()->company ? auth()->user()->company->id : null]])->get()->unique('group_id');
            return view('erp.transactions.purchase-entry.index', compact('data'));
        }

        toast('Something went wrong.', 'error');
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (in_array($request->type, Enum::PURCHASE_ENTRY_TYPE)) {
            return view('erp.transactions.purchase-entry.create');
        }

        toast('Something went wrong.', 'error');
        return redirect()->route('home');
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
    public function edit($id, Request $request)
    {
        if (in_array($request->type, Enum::PURCHASE_ENTRY_TYPE)) {
            return view('erp.transactions.purchase-entry.edit', compact('id'));
        }

        toast('Something went wrong.', 'error');
        return redirect()->route('home');
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
    public function destroy($id, Request $request)
    {
        if (in_array($request->type, Enum::PURCHASE_ENTRY_TYPE)) {
            
            $purchaseEntry = PurchaseEntry::find($id);
            $purchaseEntries = PurchaseEntry::where('group_id', $purchaseEntry->group_id)->get();

            foreach ($purchaseEntries as $index => $val) {
                $val->delete();
            }

            $moduleName = ucfirst(str_replace('_', ' ', $request->type));

            toast($moduleName." deleted successfully!", 'success');
            return redirect()->route('erp.account-transaction.purchase-entry.index', ['type' => $request->type]);
        }

        toast('Something went wrong.', 'error');
        return redirect()->route('home');
    }

    public function filter(Request $request)
    {
        if (in_array($request->type, Enum::PURCHASE_ENTRY_TYPE)) {
            $data = QueryBuilder::for(PurchaseEntry::class)->allowedFilters(['bill_date', 'cash_debit', 'bill_no', 'vou_no', 'tax_bill_of_supply', 'party_ac.name', 'party_ac.city.name'])->where([['type', $request->type], ['company_id', auth()->user()->company->id]])->get()->unique('group_id');
            return view('erp.transactions.purchase-entry.index', compact('data'));
        }

        toast('Something went wrong.', 'error');
        return redirect()->route('home');
    }
}
