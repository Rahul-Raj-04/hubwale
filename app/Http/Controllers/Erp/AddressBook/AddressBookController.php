<?php

namespace App\Http\Controllers\Erp\AddressBook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddressBook;
use App\Models\AddressCategory;
use App\Models\State;
use App\Models\City;

class AddressBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addressBooks = AddressBook::where('company_id', auth()->user()->company->id)->get();
        
        return view('erp.utility.personal-diary.address-book.index')->with(compact('addressBooks'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $address_categories = AddressCategory::all();
        $states = State::all();
        $cities = City::all();
        return view('erp.utility.personal-diary.address-book.create')->with(compact('address_categories', 'states', 'cities'));
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
            'name' => ['required', 'unique:address_books,name,'.$request->name]
        ]);

        AddressBook::create([
            'name' => $request->name,
            'contact_person' => $request->contact_person,
            'address' => $request->address,
            'pincode' => $request->pincode,
            'city_id' => $request->city_id,
            'state_id' => $request->state_id,
            'area' => $request->area,
            'address_category_id' => $request->address_category_id,
            'phone_1_o' => $request->phone_1_o,
            'phone_1_r' => $request->phone_1_r,
            'phone_2_o' => $request->phone_2_o,
            'phone_2_r' => $request->phone_2_r,
            'phone_f' => $request->phone_f,
            'fax_1' => $request->fax_1,
            'mobile_1' => $request->mobile_1,
            'mobile_2' => $request->mobile_2,
            'email' => $request->email,
            'website' => $request->website,
            'company_id' => auth()->user()->company->id
        ]);

        toast('Address book created successfully!', 'success');

        return redirect()->route('erp.utility.personal-diary.address-book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $addressBook = AddressBook::find($id);
        return view('erp.utility.personal-diary.address-book.show')->with(compact('addressBook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $addressBook = AddressBook::find($id);
        $address_categories = AddressCategory::all();
        $states = State::all();
        $cities = City::all();
        return view('erp.utility.personal-diary.address-book.edit')->with(compact('address_categories', 'states', 'cities', 'addressBook'));
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
            'name' => ['required', 'unique:address_books,name,'.$request->name]
        ]);

        $addressBook = AddressBook::find($id);
        $addressBook->name = $request->name;
        $addressBook->contact_person = $request->contact_person;
        $addressBook->address = $request->address;
        $addressBook->pincode = $request->pincode;
        $addressBook->city_id = $request->city_id;
        $addressBook->state_id = $request->state_id;
        $addressBook->area = $request->area;
        $addressBook->address_category_id = $request->address_category_id;
        $addressBook->phone_1_o = $request->phone_1_o;
        $addressBook->phone_1_r = $request->phone_1_r;
        $addressBook->phone_2_o = $request->phone_2_o;
        $addressBook->phone_2_r = $request->phone_2_r;
        $addressBook->phone_f = $request->phone_f;
        $addressBook->fax_1 = $request->fax_1;
        $addressBook->mobile_1 = $request->mobile_1;
        $addressBook->mobile_2 = $request->mobile_2;
        $addressBook->email = $request->email;
        $addressBook->website = $request->website;
        $addressBook->company_id =  auth()->user()->company->id;
        $addressBook->save();
        toast('Address book updated successfully!', 'success');
        return redirect()->route('erp.utility.personal-diary.address-book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $addressBook = AddressBook::find($id);
        $addressBook->delete();
        return redirect()->route('erp.utility.personal-diary.address-book.index');
    }
}
