<?php

namespace App\Http\Controllers\Erp\Reminder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reminder;
use App\Models\ReminderCategory;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reminders = Reminder::where('company_id', auth()->user()->company->id)->get();
        return view('erp.utility.personal-diary.reminder.index')->with(compact('reminders'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ReminderCategory::all();
        return view('erp.utility.personal-diary.reminder.create')->with(compact('categories'));
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
            'remind_date' => ['required', 'after:today'],
            'before_day' => 'required',
            'reminder_category_id' => 'required',
            'particular' => 'required',
            'frequency' => 'required',
            'level' => 'required'
        ]);

        Reminder::create([
            'remind_date' => $request->remind_date,
            'before_day' => $request->before_day,
            'reminder_category_id' => $request->reminder_category_id,
            'particular' => $request->particular,
            'frequency' => $request->frequency,
            'level' => $request->level,
            'company_id' => auth()->user()->company->id
        ]);
        toast('Reminder create successfully!', 'success');
        return redirect()->route('erp.utility.personal-diary.reminder.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reminder = Reminder::find($id);
        return view('erp.utility.personal-diary.reminder.show')->with(compact('reminder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = ReminderCategory::all();
        $reminder = Reminder::find($id);
        return view('erp.utility.personal-diary.reminder.edit')->with(compact('categories', 'reminder'));
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
            'remind_date' => ['required', 'after:today'],
            'before_day' => 'required',
            'reminder_category_id' => 'required',
            'particular' => 'required',
            'frequency' => 'required',
            'level' => 'required'
        ]);

        $reminder = Reminder::find($id);
        $reminder->remind_date = $request->remind_date;
        $reminder->before_day = $request->before_day;
        $reminder->reminder_category_id = $request->reminder_category_id;
        $reminder->particular = $request->particular;
        $reminder->frequency = $request->frequency;
        $reminder->level = $request->level;
        $reminder->company_id = auth()->user()->company->id;
        $reminder->save();

        toast('Reminder updated successfully!', 'success');
        return redirect()->route('erp.utility.personal-diary.reminder.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reminder = Reminder::find($id);
        $reminder->delete();
        return redirect()->route('erp.utility.personal-diary.reminder.index');
    }
}
