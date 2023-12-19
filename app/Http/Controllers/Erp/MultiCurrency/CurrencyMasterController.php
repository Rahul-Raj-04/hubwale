<?php

namespace App\Http\Controllers\Erp\MultiCurrency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CurrencyMaster;
use App\Models\Country;

class CurrencyMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencyMasters = CurrencyMaster::where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.master.multi-currency.currency-master.index')->with(compact('currencyMasters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('erp.master.multi-currency.currency-master.create')->with(compact('countries'));
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
            'symbol' => ['required'],
            'country' => ['required', 'unique:currency_masters,country_id'],
            'gc_code' => ['required']
        ]);

        CurrencyMaster::create([
            'symbol' => $request->symbol,
            'gc_code' => $request->gc_code,
            'country_id' => $request->country,
            'integer' => $request->integer,
            'fraction' => $request->fraction,
            'company_id' => auth()->user()->company ? auth()->user()->company->id : null
        ]);
        toast('Currency master created successfully!', 'success');
        return redirect()->route('erp.master.multi-currency.currency-master.index');
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
        $currencyMaster = CurrencyMaster::find($id);
        $countries = Country::all();
        return view('erp.master.multi-currency.currency-master.edit')->with(compact('countries', 'currencyMaster'));
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
            'symbol' => ['required'],
            'country' => ['required', 'unique:currency_masters,country_id'],
            'gc_code' => ['required']
        ]);

        $currencyMaster = CurrencyMaster::find($id);
        $currencyMaster->symbol = $request->symbol;
        $currencyMaster->integer = $request->integer;
        $currencyMaster->fraction = $request->fraction;
        $currencyMaster->company_id = $request->company_id;
        $currencyMaster->save();

        toast('Currency master updated successfully!', 'success');
        return redirect()->route('erp.master.multi-currency.currency-master.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currencyMaster = CurrencyMaster::find($id);
        $currencyMaster->delete();

        toast('Currency master deleted successfully!', 'success');
        return redirect()->route('erp.master.multi-currency.currency-master.index');   
    }
}
