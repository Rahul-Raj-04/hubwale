<?php

namespace App\Http\Controllers\Erp\Transactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobworkOut;
use App\Enum\Enum;
use Spatie\QueryBuilder\QueryBuilder;

class JobworkOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        if (in_array($request->type, Enum::JOBWORK_OUT_TYPES)) {
            $data = JobworkOut::Where([['module', $request->type], ['company_id', auth()->user()->company ? auth()->user()->company->id : null]])->get()->unique('group_id');
            return view('erp.transactions.jobwork-out.index', compact('data'));
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
        if (in_array($request->type, Enum::JOBWORK_OUT_TYPES)) {
            return view('erp.transactions.jobwork-out.create');
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
        if (in_array($request->type, Enum::JOBWORK_OUT_TYPES)) {
            return view('erp.transactions.jobwork-out.edit', compact('id'));
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
        if (in_array($request->type, Enum::JOBWORK_OUT_TYPES)) {
            
            $jobworkOut = JobworkOut::find($id);
            $jobworkOutEntries = JobworkOut::where('group_id', $jobworkOut->group_id)->get();
            
            foreach ($jobworkOutEntries as $index => $val) {
                $val->delete();
            }

            $moduleName = ucfirst(str_replace('_', ' ', $request->type));
            
            toast($moduleName." deleted successfully!", 'success');
            return redirect()->route('erp.account-transaction.jobwork-out.index', ['type' => $request->type, 'module' => $request->module]);
        }

        toast('Something went wrong.', 'error');
        return redirect()->route('home');
    }

    public function filter(Request $request)
    {
        $fields = [];
        if($request->type == Enum::JOBWORK_OUT_ORDER || $request->type == Enum::JOBWORK_OUT_ORDER_OPENING)
        {
            $fields[] = 'order_date';
            $fields[] = 'order_no';
        }
        
        if($request->type == Enum::JOBWORK_OUT_ISSUE ||  $request->type == Enum::JOBWORK_OUT_ISSUE_OPENING)
        {
            $fields[] = 'challan_date';
            $fields[] = 'challan_no';
        }
        if($request->type == Enum::JOBWORK_OUT_RECEIPT)
        {
            $fields[] = 'voucher_date';
            $fields[] = 'challan_no';
            $fields[] = 'voucher_no';
        }
        if($request->type == Enum::JOBWORK_OUT_BILLING)
        {
            $fields[] = 'voucher_date';
            $fields[] = 'billing_no';
        }
        if ($request->type == Enum::PHYSICAL_STOCK_VERIFICATION)
        {
            $fields[] = 'voucher_date';
            $fields[] = 'voucher_no';
        } else {
            $fields[] = 'account.name';
            $fields[] = 'account.city.name';
        }

        if($request->type == Enum::JOBWORK_OUT_ORDER || $request->type == Enum::JOBWORK_OUT_BILLING || $request->type == Enum::JOBWORK_OUT_ORDER_OPENING)
        {
            $fields[] = 'amount';
        }
        
        if (in_array($request->type, Enum::JOBWORK_OUT_TYPES)) {
            $data = QueryBuilder::for(JobworkOut::class)
            ->allowedFilters($fields)->Where([['module', $request->type], ['company_id', auth()->user()->company ? auth()->user()->company->id : null]])
            ->get()->unique('group_id');

            return view('erp.transactions.jobwork-out.index', compact('data'));
        }

        toast('Something went wrong.', 'error');
        return redirect()->route('home');
    }

    public function updateIsAudit(Request $request)
    {
        $jobworkOuts = JobworkOut::where('group_id', $request->group_id)->get();
        foreach ($jobworkOuts as $key => $jobworkOut) {
            $jobworkOut->is_audit = $request->is_audit;
            $jobworkOut->save();
        }
    }
}
