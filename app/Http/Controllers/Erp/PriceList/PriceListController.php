<?php

namespace App\Http\Controllers\Erp\PriceList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PriceList;
use App\Enum\Enum;
use App\Models\Service;
use App\Exports\Erp\Master\PriceList\PriceListExport;
use Maatwebsite\Excel\Facades\Excel;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priceLists = PriceList::Where('company_id', auth()->user()->company->id)->get();
        return view('erp.price-list.index', compact('priceLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $priceListEnums = Enum::PRICE_LIST;
        return view('erp.price-list.create', compact('priceListEnums'));
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
            'name'              => 'required',
            'from'              => 'required',
            'to'                => 'required',
            'sale_purchase'     => 'required',
            'active_deactive'   => 'required',
            'level'             => 'required',
            'rate_type'         => 'required',
            'ask_on'            => 'required',
        ]);

        if($request->multiple_product_level && $request->multiple_party_level){
            $product_level = json_encode($request->multiple_product_level);
            $party_level = json_encode($request->multiple_party_level);
        } else {
            $product_level = json_encode($request->product_level);
            $party_level = json_encode($request->party_level);
        }
        PriceList::create([
            'name'              =>  $request->name,
            'from'              =>  $request->from,
            'to'                =>  $request->to,
            'sale_purchase'     =>  $request->sale_purchase,
            'active_deactive'   =>  $request->active_deactive,
            'level'             =>  $request->level,
            'party_level'       =>  $party_level,
            'product_level'     =>  $product_level,
            'rate_type'         =>  $request->rate_type,
            'ask_on'            =>  $request->ask_on,
            'company_id'        =>  auth()->user()->company ? auth()->user()->company->id : null,
        ]);

        toast('Price List created successfully!', 'success');
        return redirect()->route('erp.master.price-list.index');
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
        $priceList = PriceList::find($id);
        $priceListEnums = Enum::PRICE_LIST;
        return view('erp.price-list.edit', compact('priceListEnums', 'priceList'));      
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
            'name'              => 'required',
            'from'              => 'required',
            'to'                => 'required',
            'sale_purchase'     => 'required',
            'active_deactive'   => 'required',
            'level'             => 'required',
            'rate_type'         => 'required',
            'ask_on'            => 'required',
        ]);

        $priceList = PriceList::find($id);
        if($request->level == 'multi_level'){
            $product_level = json_encode($request->multiple_product_level);
            $party_level = json_encode($request->multiple_party_level);
        } else {
            $product_level = json_encode($request->product_level);
            $party_level = json_encode($request->party_level);
        }
        $priceList->name              =   $request->name;
        $priceList->from              =   $request->from;
        $priceList->to                =   $request->to;
        $priceList->sale_purchase     =   $request->sale_purchase;
        $priceList->active_deactive   =   $request->active_deactive;
        $priceList->level             =   $request->level;
        $priceList->rate_type         =   $request->rate_type;
        $priceList->ask_on            =   $request->ask_on;
        $priceList->party_level       =   $party_level;
        $priceList->product_level     =   $product_level;
        $priceList->save();

        toast('Price List updated successfully!', 'success');
        return redirect()->route('erp.master.price-list.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $priceLists = PriceList::find($id);
        $priceLists->delete();

        toast('Price List deleted successfully!', 'success');
        return redirect()->route('erp.master.price-list.index');
    }


    public function updateActiveStatus(Request $request)
    {
        $priceList = PriceList::find($request->id);
        if ($priceList){
            if($request->active_deactive == 1){
                $priceList->active_deactive = 'active';
            } else {
                $priceList->active_deactive = 'deactive';                
            }
            $priceList->save();
        }
    }

    public function entryShow($id)
    {
        $priceList = PriceList::find($id);
        $services = Service::Where('company_id',auth()->user()->company->id)->get();
        return view('erp.price-list.show-entry', compact('priceList', 'services'));        
    }

    public function export(Request $request)
    {
        return Excel::download(new PriceListExport, 'pricelist.xlsx');
    }
}
