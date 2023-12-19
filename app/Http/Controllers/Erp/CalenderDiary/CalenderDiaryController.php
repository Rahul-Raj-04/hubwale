<?php

namespace App\Http\Controllers\Erp\CalenderDiary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CalenderDiary;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class CalenderDiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('erp.utility.personal-diary.calender-diary.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('erp.utility.personal-diary.calender-diary.create');
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
            'date' => ['required', 'after:today'],
            'time' => ['required'],
            'duration' => ['required'],
            'type' => ['required'],
            'particulars' => ['required']
        ]);

        CalenderDiary::create([
            'date' => $request->date,
            'time' => $request->time,
            'duration' => $request->duration,
            'type' => $request->type,
            'particulars' => $request->particulars,
            'company_id' => auth()->user()->company->id
        ]);
        toast('Calender diary created successfully!', 'success');
        return redirect()->route('erp.utility.calender-diary.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calenderDiary = CalenderDiary::find($id);
        return view('erp.utility.personal-diary.calender-diary.show')->with(compact('calenderDiary'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calenderDiary = CalenderDiary::find($id);
        return view('erp.utility.personal-diary.calender-diary.edit')->with(compact('calenderDiary'));
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
            'date' => ['required', 'after:today'],
            'time' => ['required'],
            'duration' => ['required'],
            'type' => ['required'],
            'particulars' => ['required']
        ]);

        $calenderDiary = CalenderDiary::find($id);
        $calenderDiary->date = $request->date;
        $calenderDiary->time = $request->time;
        $calenderDiary->duration = $request->duration;
        $calenderDiary->type = $request->type;
        $calenderDiary->particulars = $request->particulars;
        $calenderDiarycompany_id = auth()->user()->company->id;
        $calenderDiary->save();

        toast('Calender diary updated successfully!', 'success');

        return redirect()->route('erp.utility.calender-diary.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calenderDiary = CalenderDiary::find($id);
        $calenderDiary->delete();
        return redirect()->route('erp.utility.calender-diary.index');
    }
}
