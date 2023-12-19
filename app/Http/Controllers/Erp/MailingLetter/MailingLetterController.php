<?php

namespace App\Http\Controllers\Erp\MailingLetter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MailingLetter;
use App\Enum\Enum;

class MailingLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mailingLetters = MailingLetter::where('company_id', auth()->user()->company->id)->get();
        return view('erp.utility.personal-diary.mailing-letter.index')->with(compact('mailingLetters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('erp.utility.personal-diary.mailing-letter.create');
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
        $mailingLetter = MailingLetter::find($id);
        $allFields = Enum::MAILING_LETTER_FIELD;
        $mailingLetterfields = json_decode($mailingLetter->custom_fields);
        $custom_fields = [];
        foreach ($allFields as $key1 => $fields) {
            foreach ($fields as $field => $label) {
                foreach ($mailingLetterfields as $existingField => $mailingLetterfield) {
                    if($mailingLetterfield->field_name == $field) {
                        $custom_fields[] = ['label' => $label, 'field_name' => $mailingLetterfield->field_name, 'field_value' => $mailingLetterfield->field_value];
                    }
                }
            }
        }
        
        return view('erp.utility.personal-diary.mailing-letter.show')->with(compact('mailingLetter', 'custom_fields'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mailingLetter = MailingLetter::find($id);
        return view('erp.utility.personal-diary.mailing-letter.edit')->with(compact('mailingLetter'));
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
        $mailingLetter = MailingLetter::find($id);
        $mailingLetter->delete();
        return redirect()->route('erp.utility.personal-diary.mailing-letter.index');
    }
}
