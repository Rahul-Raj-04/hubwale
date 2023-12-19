<?php

namespace App\Http\Controllers\Erp\Transactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobworkIn;
use App\Enum\Enum;
use Spatie\QueryBuilder\QueryBuilder;

class JobworkInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (in_array($request->type, Enum::JOBWORK_IN_TYPES)) {
            $data = JobworkIn::Where([['module', $request->type], ['company_id', auth()->user()->company ? auth()->user()->company->id : null]])->get()->unique('group_id');
            return view('erp.transactions.jobwork-in.index', compact('data'));
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
        if (in_array($request->type, Enum::JOBWORK_IN_TYPES)) {
            return view('erp.transactions.jobwork-in.create');
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
    public function edit(Request $request, $id)
    {
        if (in_array($request->type, Enum::JOBWORK_IN_TYPES)) {
            return view('erp.transactions.jobwork-in.edit', compact('id'));
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
        if (in_array($request->type, Enum::JOBWORK_IN_TYPES)) {
            
            $jobworkIn = JobworkIn::find($id);
            $jobworkInEntries = JobworkIn::where('group_id', $jobworkIn->group_id)->get();

            foreach ($jobworkInEntries as $index => $val) {
                $val->delete();
            }

            $moduleName = ucfirst(str_replace('_', ' ', $request->type));

            toast($moduleName." deleted successfully!", 'success');
            return redirect()->route('erp.account-transaction.jobwork-in.index', ['type' => $request->type, 'module' => $request->module]);
        }

        toast('Something went wrong.', 'error');
        return redirect()->route('home');
    }

    public function filter(Request $request)
    {
        $fields = [];
        if($request->type == Enum::JOBWORK_IN_ORDER || $request->type == Enum::JOBWORK_IN_ORDER_OPENING){
            $fields[] = 'order_date';
            $fields[] = 'order_no';
        }
        if($request->type == Enum::JOBWORK_IN_ISSUE || $request->type == Enum::JOBWORK_IN_RECEIPT || $request->type == Enum::JOBWORK_IN_ISSUE_OTHER || $request->type == Enum::JOBWORK_IN_RECEIPT_OPENING){
            $fields[] = 'challan_date';
            $fields[] = 'challan_no';
        }
        if($request->type == Enum::JOBWORK_IN_PRODUCTION || $request->type == Enum::JOBWORK_IN_PRODUCTION_OPENING)
        {
            $fields[] = 'voucher_date';
            $fields[] = 'voucher_no';
        }
        if($request->type == Enum::JOBWORK_IN_BILLING)
        {
            $fields[] = 'voucher_date';
            $fields[] = 'billing_no';
        }
        
        $fields[] = 'account.name';
        $fields[] = 'account.city.name';
        
        if (in_array($request->type, Enum::JOBWORK_IN_TYPES)) {
            $data = QueryBuilder::for(JobworkIn::class)->allowedFilters($fields)->Where([['module', $request->type], ['company_id',auth()->user()->company->id]])->get()->unique('group_id');

            return view('erp.transactions.jobwork-in.index', compact('data'));
        }

        toast('Something went wrong.', 'error');
        return redirect()->route('home');
    }

    public function updateIsAudit(Request $request)
    {
        $jobworkIns = JobworkIn::where('group_id', $request->group_id)->get();
        foreach ($jobworkIns as $key => $jobworkIn) {
            $jobworkIn->is_audit = $request->is_audit;
            $jobworkIn->save();
        }
    }
}
