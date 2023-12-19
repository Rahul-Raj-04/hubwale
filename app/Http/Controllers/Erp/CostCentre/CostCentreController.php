<?php

namespace App\Http\Controllers\Erp\CostCentre;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CostCentre;
use App\Models\CostCategory;
use App\Exports\Erp\Master\CostCentre\CostCentreExport;
use Maatwebsite\Excel\Facades\Excel;

class CostCentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costCentres = CostCentre::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.master.cost-centre.cost-centre.index')->with(compact('costCentres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costCategories = CostCategory::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.master.cost-centre.cost-centre.create')->with(compact('costCategories'));
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
            'name' => ['required'],
            'cost_category_id' => ['required']
        ]);

        CostCentre::create([
            'name' => $request->name,
            'cost_category_id' => $request->cost_category_id,
            'company_id' => auth()->user()->company ? auth()->user()->company->id : null
        ]);

        toast('Cost centre created successfully!', 'success');
        return redirect()->route('erp.master.cost-centre.cost-centre.index');
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
        $costCentre = CostCentre::find($id);
        $costCategories = CostCategory::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.master.cost-centre.cost-centre.edit')->with(compact('costCategories', 'costCentre'));
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
            'name' => ['required'],
            'cost_category_id' => ['required']
        ]);
        $costCentre = CostCentre::find($id);
        $costCentre->name = $request->name;
        $costCentre->cost_category_id = $request->cost_category_id;
        $costCentre->save();

        toast('Cost centre updated successfully!', 'success');
        return redirect()->route('erp.master.cost-centre.cost-centre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $costCentre = CostCentre::find($id);
        $costCentre->delete();

        toast('Cost centre deleted successfully!', 'success');
        return redirect()->route('erp.master.cost-centre.cost-centre.index');
    }

    public function export()
    {
        return Excel::download(new CostCentreExport(), 'costCentres.xlsx');
    }
}
