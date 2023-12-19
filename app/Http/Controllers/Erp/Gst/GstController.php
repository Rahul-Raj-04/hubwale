<?php

namespace App\Http\Controllers\Erp\Gst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GstSalesSetup;
use App\Models\GstSlab;
use App\Models\GstCommodity;
use App\Models\JWOutSetup;
use App\Models\JWInSetup;
use App\Models\CreditNoteWithStockSetup;
use App\Models\DebitNoteWithStockSetup;
use App\Enum\Enum;

class GstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function salesSetupIndex(Request $request)
    {
        if ($request->type != 'sale_setup' && $request->type != 'purchase_setup') {

            toast('Something went wrong.', 'error');
            return redirect()->route('erp.master.gst.sales-setup.index', ['type' => 'sale_setup']);
        }
        $type = $request->type;
        return view('erp.gst.sales-setup.index', compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function salesSetupCreate(Request $request)
    {
        if ($request->type == 'sale_setup' || $request->type == 'purchase_setup') {
            return view('erp.gst.sales-setup.create');
        } else {
            toast('Something went wrong.', 'error');
            return redirect()->route('erp.master.gst.sales-setup.index', ['type' => 'sale_setup']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function salesSetupEdit(Request $request, $id)
    {
        if ($request->type == 'sale_setup' || $request->type == 'purchase_setup') {
            return view('erp.gst.sales-setup.edit', compact('id'));
        } else {
            toast('Something went wrong.', 'error');
            return redirect()->route('erp.master.gst.sales-setup.index', ['type' => 'sale_setup']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function salesSetupDestroy(Request $request, $id)
    {
        if ($request->type == 'sale_setup' || $request->type == 'purchase_setup') {

            $gstSalesSetup = GstSalesSetup::find($id);
            $gstSalesSetup->delete();
            $type = $request->type == 'sale_setup' ? 'Sales' : 'Purchase';

            toast("$type setup deleted successfully!", 'success');
            return redirect()->route('erp.master.gst.sales-setup.index', ['type' => $request->type]);
        } else {

            toast('Something went wrong.', 'error');
            return redirect()->route('erp.master.gst.sales-setup.index', ['type' => 'sale_setup']);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gstSlabIndex()
    {
        $gstSlabs  = GstSlab::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
    
        return view('erp.gst.slab.index', compact('gstSlabs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gstSlabCreate()
    {
        return view('erp.gst.slab.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gstSlabEdit($id)
    {
        return view('erp.gst.slab.edit', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gstSlabDestroy($id)
    {
        $gstSlab = GstSlab::find($id);
        $gstSlab->delete();

        toast('Gst slab deleted successfully!', 'success');

        return redirect()->route('erp.gst.slab.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gstCommodityIndex()
    {
        $gstCommodities  = GstCommodity::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
    
        return view('erp.gst.gst-commodity.index', compact('gstCommodities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gstCommodityCreate()
    {
        return view('erp.gst.gst-commodity.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gstCommodityEdit($id)
    {
        return view('erp.gst.gst-commodity.edit', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gstCommodityDestroy($id)
    {
        $gstCommodity = GstCommodity::find($id);
        $gstCommodity->delete();

        toast('GST Commodity deleted successfully!', 'success');

        return redirect()->route('erp.gst.gst-commodity.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jwOutSetupIndex()
    {
        
        return view('erp.master.gst.j-w-out-setup.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jwOutSetupCreate()
    {
        return view('erp.master.gst.j-w-out-setup.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function jwOutSetupEdit($id)
    {
        return view('erp.master.gst.j-w-out-setup.edit', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function jwOutSetupDestroy($id)
    {
        $JWOutSetup = JWOutSetup::find($id);
        $JWOutSetup->delete();

        toast('JW out setup deleted successfully!', 'success');

        return redirect()->route('erp.master.gst.jw-out-setup.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jwInSetupIndex()
    {   
        return view('erp.master.gst.j-w-in-setup.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jwInSetupCreate()
    {
        return view('erp.master.gst.j-w-in-setup.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function jwInSetupEdit($id)
    {
        return view('erp.master.gst.j-w-in-setup.edit', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function jwInSetupDestroy($id)
    {
        $jwInSetup = JWInSetup::find($id);
        $jwInSetup->delete();

        toast('JW in setup deleted successfully!', 'success');

        return redirect()->route('erp.master.gst.jw-in-setup.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creditNoteStockSetupIndex()
    {   
        return view('erp.master.gst.credit-note-stock-setup.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creditNoteStockCreate()
    {
        return view('erp.master.gst.credit-note-stock-setup.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function creditNoteStockEdit($id)
    {
        return view('erp.master.gst.credit-note-stock-setup.edit', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function creditNoteStockDestroy($id)
    {
        $creditNoteStockSetup = CreditNoteWithStockSetup::find($id);
        $creditNoteStockSetup->delete();

        toast('Credit note stock deleted successfully!', 'success');

        return redirect()->route('erp.master.gst.credit-note-setup.index');
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function debitNoteStockSetupIndex()
    {   
        return view('erp.master.gst.debit-note-stock-setup.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function debitNoteStockCreate()
    {
        return view('erp.master.gst.debit-note-stock-setup.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function debitNoteStockEdit($id)
    {
        return view('erp.master.gst.debit-note-stock-setup.edit', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function debitNoteStockDestroy($id)
    {
        $debitNoteStockSetup = DebitNoteWithStockSetup::find($id);
        $debitNoteStockSetup->delete();

        toast('Debit note stock setup deleted successfully!', 'success');

        return redirect()->route('erp.master.gst.debit-note-setup.index');
    }
}
