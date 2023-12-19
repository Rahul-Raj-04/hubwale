<?php

namespace App\Http\Controllers\Erp\GstEntry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GstJournalEntry;

class GstJournalEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gstJournalEntries = GstJournalEntry::where('company_id', auth()->user()->company->id)->get();
        return view('erp.gst.gst-entry.journal-entry.index')->with(compact('gstJournalEntries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('erp.gst.gst-entry.journal-entry.create');
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
        //
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
        $journalEntry = GstJournalEntry::find($id);
        $journalEntry->delete();

        toast('Journal entry deleted successfully!', 'success');
        return redirect()->route('erp.gst.gst-entry.journal-entry.index');
    }
}
