<?php

namespace App\Http\Controllers\Erp\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountGroup;
use App\Exports\AccountGroupExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Account;

class AccountGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account_groups = AccountGroup::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.account-group.index')->with(compact('account_groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account_groups = AccountGroup::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.account-group.create')->with(compact('account_groups'));
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
            'name' => 'required',
            'parent_id' => 'required',
        ]);

        $parentAcGroup = AccountGroup::find($request->parent_id);

        AccountGroup::create([
            'name'                      =>  $request->name,
            'parent_id'                 =>  $request->parent_id,
            'header'                    =>  $request->header ?? $request->name,
            'sequence'                  =>  $request->sequence ?? 0,
            'is_default'                =>  0,
            'category'                  =>  $parentAcGroup->category,
            'company_id'                =>  auth()->user()->company ? auth()->user()->company->id : null,
            'city_id'                   =>  $parentAcGroup->city_id,
            'city_id_default'           =>  $parentAcGroup->city_id_default,
            'pincode'                   =>  $parentAcGroup->pincode,
            'pincode_default'           =>  $parentAcGroup->pincode_default,
            'area'                      =>  $parentAcGroup->area,
            'area_default'              =>  $parentAcGroup->area_default,
            'mobile'                    =>  $parentAcGroup->mobile,
            'mobile_default'            =>  $parentAcGroup->mobile_default,
            'state_id'                  =>  $parentAcGroup->state_id,
            'state_id_default'          =>  $parentAcGroup->state_id_default,
            'pan_no'                    =>  $parentAcGroup->pan_no,
            'pan_no_default'            =>  $parentAcGroup->pan_no_default,
            'aadhar_no'                 =>  $parentAcGroup->aadhar_no,
            'aadhar_no_default'         =>  $parentAcGroup->aadhar_no_default,
            'gstin_no'                  =>  $parentAcGroup->gstin_no,
            'gstin_no_default'          =>  $parentAcGroup->gstin_no_default,
            'balance_method'            =>  $parentAcGroup->balance_method,
            'balance_method_default'    =>  $parentAcGroup->balance_method_default,
            'opening_balance'           =>  $parentAcGroup->opening_balance,
            'opening_balance_default'   =>  $parentAcGroup->opening_balance_default,
            'balance_type'              =>  $parentAcGroup->balance_type,
            'balance_type_default'      =>  $parentAcGroup->balance_type_default,
            'credit_limit'              =>  $parentAcGroup->credit_limit,
            'credit_limit_default'      =>  $parentAcGroup->credit_limit_default,
            'credit_days'               =>  $parentAcGroup->credit_days,
            'credit_days_default'       =>  $parentAcGroup->credit_days_default,
            'account_address_details'   =>  $parentAcGroup->account_address_details,
            'account_bank_details'      =>  $parentAcGroup->account_bank_details,
            'account_interest'          =>  $parentAcGroup->account_interest,
        ]);

        toast('Account group created successfully!', 'success');

        return redirect()->route('erp.master.account-group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account_group = AccountGroup::find($id);
        $account_groups = AccountGroup::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();

        return view('erp.account-group.show')->with(compact('account_group', 'account_groups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account_group = AccountGroup::find($id);
        $account_groups = AccountGroup::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.account-group.edit')->with(compact('account_group', 'account_groups'));
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
        $account_group = AccountGroup::find($id);

        if(!$account_group->is_default)
        {
            $request->validate([
                'name' => 'required',
                'parent_id' => 'required',
            ]);

            $parentAcGroup = AccountGroup::find($request->parent_id);

            $account_group->name                      =  $request->name;
            $account_group->parent_id                 =  $request->parent_id;
            $account_group->category                  =  $parentAcGroup->category;
            $account_group->city_id                   =  $parentAcGroup->city_id;
            $account_group->city_id_default           =  $parentAcGroup->city_id_default;
            $account_group->pincode                   =  $parentAcGroup->pincode;
            $account_group->pincode_default           =  $parentAcGroup->pincode_default;
            $account_group->area                      =  $parentAcGroup->area;
            $account_group->area_default              =  $parentAcGroup->area_default;
            $account_group->mobile                    =  $parentAcGroup->mobile;
            $account_group->mobile_default            =  $parentAcGroup->mobile_default;
            $account_group->state_id                  =  $parentAcGroup->state_id;
            $account_group->state_id_default          =  $parentAcGroup->state_id_default;
            $account_group->pan_no                    =  $parentAcGroup->pan_no;
            $account_group->pan_no_default            =  $parentAcGroup->pan_no_default;
            $account_group->aadhar_no                 =  $parentAcGroup->aadhar_no;
            $account_group->aadhar_no_default         =  $parentAcGroup->aadhar_no_default;
            $account_group->gstin_no                  =  $parentAcGroup->gstin_no;
            $account_group->gstin_no_default          =  $parentAcGroup->gstin_no_default;
            $account_group->balance_method            =  $parentAcGroup->balance_method;
            $account_group->balance_method_default    =  $parentAcGroup->balance_method_default;
            $account_group->opening_balance           =  $parentAcGroup->opening_balance;
            $account_group->opening_balance_default   =  $parentAcGroup->opening_balance_default;
            $account_group->balance_type              =  $parentAcGroup->balance_type;
            $account_group->balance_type_default      =  $parentAcGroup->balance_type_default;
            $account_group->credit_limit              =  $parentAcGroup->credit_limit;
            $account_group->credit_limit_default      =  $parentAcGroup->credit_limit_default;
            $account_group->credit_days               =  $parentAcGroup->credit_days;
            $account_group->credit_days_default       =  $parentAcGroup->credit_days_default;
            $account_group->account_address_details   =  $parentAcGroup->account_address_details;
            $account_group->account_bank_details      =  $parentAcGroup->account_bank_details;
            $account_group->account_interest          =  $parentAcGroup->account_interest;
        }

        $account_group->header = $request->header;
        $account_group->sequence = $request->sequence;
        $account_group->save();

        toast('Account group updated successfully!', 'success');

        return redirect()->route('erp.master.account-group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account_group = AccountGroup::find($id);
        $accoutsOfGroup = Account::where('account_group_id', $account_group->id)->first();
        $acGroupsSubGroup = AccountGroup::where('parent_id', $account_group->id)->first();
        
        if ($accoutsOfGroup) {
            toast('Group Has Account, Cannot Delete', 'error');    
            return back();
        }

        if ($acGroupsSubGroup) {
            toast('Can not be deleted because this Group has subgroup', 'error');    
            return back();
        }

        $account_group->delete();

        toast('Account group deleted successfully!', 'success');
        return redirect()->route('erp.master.account-group.index');
    }

    public function export(Request $request)
    {
        if ($request->format == 'excel') {
            return Excel::download(new AccountGroupExport, 'account-groups.xlsx');
        } elseif ($request->format == 'pdf') {
            return (new AccountGroupExport)->download('account-groups.pdf', \Maatwebsite\Excel\Excel::MPDF);
        }

        toast('Something went wrong!', 'error');
        return back();
    }
}
