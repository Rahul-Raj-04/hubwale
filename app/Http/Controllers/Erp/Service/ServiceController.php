<?php

namespace App\Http\Controllers\Erp\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Account;
use App\Models\GstCommodity;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Erp\Master\Service\Export;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gstCommoditys  =   GstCommodity::Where('company_id', auth()->user()->company->id)->get();
        $accounts       =   Account::Where('company_id', auth()->user()->company->id)->whereHas('account_group', function($ag)
        {
            $ag->whereIn('name', ['Income', 'Income (Other Then Sales)']);
        })->get();

        return view('erp.service.create', compact('gstCommoditys', 'accounts'));
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
            'name'          => 'required',
            'account_id'    => 'required',
        ]);

        Service::create([
            'name'              =>  $request->name,
            'alias'             =>  $request->alias ? $request->alias : null,
            'gst_commodity_id'  =>  $request->gst_commodity_id ? $request->gst_commodity_id : null,
            'account_id'        =>  $request->account_id,
            'company_id'        =>  auth()->user()->company ? auth()->user()->company->id : null,
        ]);

        toast('Service created successfully!', 'success');
        return redirect()->route('erp.master.service.index');
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
        $service        =   Service::find($id);
        $gstCommoditys  =   GstCommodity::Where('company_id', auth()->user()->company->id)->get();
        $accounts       =   Account::Where('company_id',auth()->user()->company->id)->whereHas('account_group', function($ag)
        {
            $ag->whereIn('name', ['Income', 'Income (Other Then Sales)']);
        })->get();

        return view('erp.service.edit', compact('service', 'gstCommoditys', 'accounts'));   
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
            'name'          =>  'required',
            'account_id'    =>  'required',
        ]);

        $service = Service::find($id);

        $service->name              =   $request->name;
        $service->alias             =   $request->alias ? $request->alias : null;
        $service->gst_commodity_id  =   $request->gst_commodity_id ? $request->gst_commodity_id : null;
        $service->account_id        =   $request->account_id;
        $service->company_id        =   auth()->user()->company->id;
        $service->save();

        toast('Service updated successfully!', 'success');
        return redirect()->route('erp.master.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        toast('Service deleted successfully!', 'success');
        return redirect()->route('erp.master.service.index');
    }

    public function export()
    {
        return Excel::download(new Export(), 'services.xlsx');
    }
    
}
