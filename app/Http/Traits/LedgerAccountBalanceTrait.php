<?php 

namespace App\Http\Traits;

use App\Models\LedgerAccountBalance;
use App\Models\Account;

/**
 * Store Account credit or debit
 */
trait LedgerAccountBalanceTrait
{
    public function LedgerAccountBalanceCreateOrUpdate($data)
    {
        // $data = [
        //     'account_id',
        //     'balance',
        //     'type',
        //     'balance_type',
        //     'closing_balance',
        //     'date',
        //     'vou_doc_no',
        //     'type_id',
        //     'opposite_account_id',
        //      'model_name'
        // ];

        if (empty($data['account_id']) || empty($data['balance']) || empty($data['type']) || empty($data['balance_type'])) {
            return toast('Something went wrong!', 'error');
        }
        if(!array_key_exists('model_name', $data)){
            $data['model_name'] = null;
        }

        // if ($data['type'] != 'opening_balance' && empty($data['opposite_account_id'])) {
        //     return toast('Something went wrong!', 'error');
        // }
        $lastLadgerAccount = LedgerAccountBalance::where('account_id', $data['account_id'])->latest()->first();
       if ($data['balance_type'] == 'credit') {
            $existingLedgerAccount = LedgerAccountBalance::where('type_id', $data['type_id'])->where('type', $data['type'])->where('account_id', $data['account_id'])->first();
            if ($existingLedgerAccount) {
                $closing_balance = $existingLedgerAccount->closing_balance - $existingLedgerAccount->balance;
                $existingLedgerAccount->balance = $data['balance'];
                $existingLedgerAccount->balance_type = $data['balance_type'];
                $existingLedgerAccount->closing_balance = $closing_balance + $data['balance'];
                $existingLedgerAccount->date = $data['date'];
                $existingLedgerAccount->vou_doc_no = $data['vou_doc_no'];
                $existingLedgerAccount->opposite_account_id = $data['opposite_account_id'];
                $existingLedgerAccount->save();

                $closingBalanceUpdatesLedgers = LedgerAccountBalance::where('created_at', '>=', $existingLedgerAccount->created_at)->where('id', '!=', $existingLedgerAccount->id)->where('account_id', $data['account_id'])->get();
                $updatedClosingBalance = $existingLedgerAccount->closing_balance;
                foreach ($closingBalanceUpdatesLedgers as $key => $closingBalanceUpdatesLedger) {
                    if ($closingBalanceUpdatesLedger->balance_type == 'credit') {
                        $updatedClosingBalance = (int)$updatedClosingBalance + (int)$closingBalanceUpdatesLedger->balance;
                    } else {
                        $updatedClosingBalance = (int)$updatedClosingBalance - (int)$closingBalanceUpdatesLedger->balance;
                    }
                    $closingBalanceUpdatesLedger->closing_balance = $updatedClosingBalance;
                    $closingBalanceUpdatesLedger->save();
                }
            } else {
                $ladgerAccount = LedgerAccountBalance::create([
                    'account_id' => $data['account_id'],
                    'balance'    => $data['balance'],
                    'balance_type' => $data['balance_type'],
                    'type'       => $data['type'],
                    'closing_balance' => $lastLadgerAccount ? (int)$lastLadgerAccount->closing_balance + (int)$data['balance'] : (int)$data['balance'],
                    'date' => $data['date'], 
                    'vou_doc_no' => $data['vou_doc_no'],
                    'type_id' => $data['type_id'],
                    'opposite_account_id' => $data['opposite_account_id'],
                    'model_name' => $data['model_name']
                ]);
                return $ladgerAccount;
            }

        } elseif ($data['balance_type'] == 'debit'){
            $existingLedgerAccount = LedgerAccountBalance::where('type_id', $data['type_id'])->where('type', $data['type'])->where('account_id', $data['account_id'])->first();
            if ($existingLedgerAccount) {
                $closing_balance = $existingLedgerAccount->closing_balance + $existingLedgerAccount->balance;
                $existingLedgerAccount->balance = $data['balance'];
                $existingLedgerAccount->balance_type = $data['balance_type'];
                $existingLedgerAccount->closing_balance = $closing_balance - $data['balance'];
                $existingLedgerAccount->date = $data['date'];
                $existingLedgerAccount->vou_doc_no = $data['vou_doc_no'];
                $existingLedgerAccount->opposite_account_id = $data['opposite_account_id'];
                $existingLedgerAccount->save();

                $closingBalanceUpdatesLedgers = LedgerAccountBalance::where('created_at', '>=', $existingLedgerAccount->created_at)->where('id', '!=', $existingLedgerAccount->id)->where('account_id', $data['account_id'])->get();
                $updatedClosingBalance = $existingLedgerAccount->closing_balance;
                foreach ($closingBalanceUpdatesLedgers as $key => $closingBalanceUpdatesLedger) {
                    if ($closingBalanceUpdatesLedger->balance_type == 'debit') {
                        $updatedClosingBalance = (int)$updatedClosingBalance - (int)$closingBalanceUpdatesLedger->balance;
                    } else {
                        $updatedClosingBalance = (int)$updatedClosingBalance + (int)$closingBalanceUpdatesLedger->balance;
                    }
                    $closingBalanceUpdatesLedger->closing_balance = $updatedClosingBalance;
                    $closingBalanceUpdatesLedger->save();
                }

            } else {
                $ladgerAccount = LedgerAccountBalance::create([
                    'account_id' => $data['account_id'],
                    'balance'    => $data['balance'],
                    'balance_type' => $data['balance_type'],
                    'type'       => $data['type'],
                    'closing_balance' => $lastLadgerAccount ? (int)$lastLadgerAccount->closing_balance - (int)$data['balance'] :($data['type'] == 'opening_balance' ? (int)$data['balance'] :  -(int)$data['balance']),
                    'date' => $data['date'], 
                    'vou_doc_no' => $data['vou_doc_no'],
                    'type_id' => $data['type_id'],
                    'opposite_account_id' => $data['opposite_account_id'],
                    'model_name' => $data['model_name']
                ]);
                return $ladgerAccount;
            }
        } else {
            return toast('Something went wrong!', 'error');
        }
    }
}