<?php

namespace App\Http\Controllers\Erp\QuickEntry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuickEntry;
use App\Enum\Enum;

class QuickEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cashBankIndex()
    {
        return view('erp.transactions.quick-entry.cash-bank-entry.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function journalIndex()
    {
        return view('erp.transactions.quick-entry.journal-entry.index');
    }
}
