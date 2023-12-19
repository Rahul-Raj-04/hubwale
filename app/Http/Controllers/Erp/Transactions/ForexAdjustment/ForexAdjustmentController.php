<?php

namespace App\Http\Controllers\Erp\Transactions\ForexAdjustment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ForexAdjustment;
use Spatie\QueryBuilder\QueryBuilder;

class ForexAdjustmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forexAdjustments = ForexAdjustment::where('company_id', auth()->user()->company->id)->get();
        return view('erp.transactions.forex-adjustment.index')->with(compact('forexAdjustments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('erp.transactions.forex-adjustment.create');
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
        $forexAdjustment = ForexAdjustment::find($id);
        return view('erp.transactions.forex-adjustment.edit')->with(compact('forexAdjustment'));
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
        $forexAdjustments = ForexAdjustment::where('group_id', $group_id)->get();
        foreach ($forexAdjustments as $key => $forexAdjustment) {
            $forexAdjustment->delete();
        }

        toast('Forex adjustment created successfully!', 'success');
        return redirect()->route('erp.account-transaction.forex-adjustment.index');
    }

    public function updateIsAudit(Request $request)
    {
        $forexAdjustments = ForexAdjustment::where('group_id', $request->group_id)->get();
        foreach ($forexAdjustments as $key => $forexAdjustment) {
            $forexAdjustment->is_audit = $request->is_audit;
            $forexAdjustment->save();
        }
        return response()->json(["success" => true]);
    }

    public function filter(Request $request)
    {
        $forexAdjustments = QueryBuilder::for(ForexAdjustment::class)->allowedFilters(['vou_date', 'vou_no', 'account.name', 'balance_type'])->where('company_id', auth()->user()->company->id)->get();
        return view('erp.transactions.forex-adjustment.index')->with(compact('forexAdjustments'));
    }
}
