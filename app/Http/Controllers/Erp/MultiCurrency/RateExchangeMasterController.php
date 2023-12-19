<?php

namespace App\Http\Controllers\Erp\MultiCurrency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RateExchangeMaster;
use App\Models\CurrencyMaster;

class RateExchangeMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rateExchangeMasters = RateExchangeMaster::all();
        return view('erp.master.multi-currency.rate-exchange-master.index')->with(compact('rateExchangeMasters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencyMasters = CurrencyMaster::all();
        return view('erp.master.multi-currency.rate-exchange-master.create')->with(compact('currencyMasters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'currency_master_id' => 'required',
            'date' => 'required',
            'standard_rate' => 'required|numeric',
            'selling_rate' => 'required|numeric',
            'buyung_rate' => 'required|numeric'
        ]);

        RateExchangeMaster::create([
            'currency_master_id' => $request->currency_master_id,
            'date' => $request->date,
            'standard_rate' => $request->standard_rate,
            'selling_rate' => $request->selling_rate,
            'buyung_rate' => $request->buyung_rate,
            'company_id' => auth()->user()->company ? auth()->user()->company->id : null
        ]);

        toast('Rate exchange master created successfully!', 'success');
        return redirect()->route('erp.master.multi-currency.rate-exchange-master.index');
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
        $rateExchangeMaster = RateExchangeMaster::find($id);
        $currencyMasters = CurrencyMaster::all();
        return view('erp.master.multi-currency.rate-exchange-master.edit')->with(compact('currencyMasters', 'rateExchangeMaster'));
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
            'currency_master_id' => 'required',
            'date' => 'required',
            'standard_rate' => 'required|numeric',
            'selling_rate' => 'required|numeric',
            'buyung_rate' => 'required|numeric'
        ]);
        $rateExchangeMaster = RateExchangeMaster::find($id);
        $rateExchangeMaster->currency_master_id = $request->currency_master_id;
        $rateExchangeMaster->date = $request->date;
        $rateExchangeMaster->standard_rate = $request->standard_rate;
        $rateExchangeMaster->selling_rate = $request->selling_rate;
        $rateExchangeMaster->buyung_rate = $request->buyung_rate;
        $rateExchangeMaster->save();

        toast('Rate exchange master updated successfully!', 'success');
        return redirect()->route('erp.master.multi-currency.rate-exchange-master.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rateExchangeMaster = RateExchangeMaster::find($id);
        $rateExchangeMaster->delete();
        toast('Rate exchange master deleted successfully!', 'success');
        return redirect()->route('erp.master.multi-currency.rate-exchange-master.index');
    }
}
