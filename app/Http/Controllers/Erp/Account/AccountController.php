<?php

namespace App\Http\Controllers\Erp\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\AccountGroup;
use App\Models\State;
use App\Models\City;
use App\Exports\AccountsExport;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\QueryBuilder\QueryBuilder;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        return view('erp.account.index')->with(compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('erp.account.create');
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
            'alias' => ['required'],
            'account_group_id' => ['required'],
            'city_id' => ['required'],
            'pincode' => ['required'],
            'area' => ['required'],
            'mobile' => ['required'],
            'state_id' => ['required'],
            'pan_no' => ['required'],
            'aadhar_no' => ['required'],
            'gstin_no' => ['required'],
            'balance_method' => ['required'],
            'opening_balance' => ['required'],
            'balance_type' => ['required'],
            'credit_limit' => ['required'],
            'credit_days' => ['required']
        ]);

        Account::create([
            'name' => $request->name,
            'alias' => $request->alias,
            'account_group_id' => $request->account_group_id,
            'city_id' => $request->city_id,
            'pincode' => $request->pincode,
            'area' => $request->area,
            'mobile' => $request->mobile,
            'state_id' => $request->state_id,
            'pan_no' => $request->pan_no,
            'aadhar_no' => $request->aadhar_no,
            'gstin_no' => $request->gstin_no,
            'balance_method' => $request->balance_method,
            'opening_balance' => $request->opening_balance,
            'balance_type' => $request->balance_type,
            'credit_limit' => $request->credit_limit,
            'credit_days' => $request->credit_days
        ]);

        toast('Account created successfully!', 'success');

        return redirect()->route('erp.master.account.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::find($id);
        $states = State::all();
        $cities = City::all();

        return view('erp.account.show')->with(compact('states', 'cities', 'account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::find($id);
        return view('erp.account.edit')->with(compact('account'));
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
            'alias' => ['required'],
            'account_group_id' => ['required'],
            'city_id' => ['required'],
            'pincode' => ['required'],
            'area' => ['required'],
            'mobile' => ['required'],
            'state_id' => ['required'],
            'pan_no' => ['required'],
            'aadhar_no' => ['required'],
            'gstin_no' => ['required'],
            'balance_method' => ['required'],
            'opening_balance' => ['required'],
            'balance_type' => ['required'],
            'credit_limit' => ['required'],
            'credit_days' => ['required']
        ]);

        $account = Account::find($id);
        $account->name = $request->name;
        $account->alias = $request->alias;
        $account->account_group_id = $request->account_group_id;
        $account->city_id = $request->city_id;
        $account->pincode = $request->pincode;
        $account->area = $request->area;
        $account->mobile = $request->mobile;
        $account->state_id = $request->state_id;
        $account->pan_no = $request->pan_no;
        $account->aadhar_no = $request->aadhar_no;
        $account->gstin_no = $request->gstin_no;
        $account->balance_method = $request->balance_method;
        $account->opening_balance = $request->opening_balance;
        $account->balance_type = $request->balance_type;
        $account->credit_limit = $request->credit_limit;
        $account->credit_days = $request->credit_days;
        $account->save();

        toast('Account updated successfully!', 'success');

        return redirect()->route('erp.master.account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::find($id);

        if (count($account->account_transaction)) {
            toast("Account cannot be deleted, because transaction is present", 'error');
            return redirect()->back();
        }

        if ($account->opening_balance > 0 && $account->opening_balance != null) {
            toast("Account cannot be deleted, because Opening Balance is present", 'error');
            return redirect()->back();
        }

        if ($account->account_address_detail) {
            $account->account_address_detail->delete();
        }
        if ($account->account_bank_detail) {
            $account->account_bank_detail->delete();
        }
        if ($account->account_interest) {
            $account->account_interest->delete();
        }

        $account->delete();
        toast('Account deleted successfully!', 'success');
        return redirect()->back();
    }
    
    public function export(Request $request)
    {
        return Excel::download(new AccountsExport, 'accounts.xlsx');
    }

    public function filter(Request $request)
    {
        $accounts = QueryBuilder::for(Account::class)
            ->allowedFilters(['name', 'account_group.name', 'opening_balance', 'city.name'])->Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)
            ->get();
        
        return view('erp.account.index')->with(compact('accounts'));
    }
}
