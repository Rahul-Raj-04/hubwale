<?php

namespace App\Http\Controllers\Erp\CostCentre;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CostCategory;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Erp\Master\CostCentre\CostCategoryExport;

class CostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costCategories = CostCategory::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.master.cost-centre.cost-category.index')->with(compact('costCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('erp.master.cost-centre.cost-category.create');
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
            'name' => ['required', 'unique:cost_categories,name']
        ]);

        CostCategory::create([
            'name' => $request->name,
            'company_id' => auth()->user()->company ? auth()->user()->company->id : null
        ]);

        toast('Cost category created successfully!', 'success');
        return redirect()->route('erp.master.cost-centre.cost-category.index');
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
        $costCategory = CostCategory::find($id);
        return view('erp.master.cost-centre.cost-category.edit')->with(compact('costCategory'));
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
            'name' => ['required', 'unique:cost_categories,name']
        ]);
        $costCategory = CostCategory::find($id);
        $costCategory->name = $request->name;
        $costCategory->save();

        toast('Cost category updated successfully!', 'success');
        return redirect()->route('erp.master.cost-centre.cost-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $costCategory = CostCategory::find($id);
        $costCategory->delete();

        toast('Cost category deleted successfully!', 'success');
        return redirect()->route('erp.master.cost-centre.cost-category.index');
    }

    public function export()
    {
        return Excel::download(new CostCategoryExport(), 'costCategories.xlsx');
    }
}