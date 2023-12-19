<?php

namespace App\Http\Controllers\Erp\GstExpense;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GstExpense;

class GstExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gstExpenses = GstExpense::where('company_id', auth()->user()->company->id)->get();
        return view('erp.gst.gst-expense.index')->with(compact('gstExpenses'));              
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('erp.gst.gst-expense.create');
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
        $gstExpense = GstExpense::find($id);
        return view('erp.gst.gst-expense.edit')->with(compact('gstExpense'));
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
    public function destroy($id)
    {
        $gstExpense = GstExpense::find($id);
        $gstExpense->delete();
        toast('GST expense deleted successfully!', 'success');

        return redirect()->route('erp.gst.gst-expense.index');
    }
}
