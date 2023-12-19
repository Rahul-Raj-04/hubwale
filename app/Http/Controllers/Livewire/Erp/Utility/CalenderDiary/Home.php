<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\CalenderDiary;

use Livewire\Component;
use App\Models\CalenderDiary;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\CalenderDiaryNote;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Home extends Component
{
    use LivewireAlert;
    
	public $calenderDiaries = [];
	public $dates = [];
	public $month_year;
	public $note;
	public $current_date;
	public $data_table_class = 'responsive-datatable';

    public function render()
    {
        return view('livewire.erp.calender-diary.home');
    }

    public function mount()
    {
    	$this->current_date = date('Y-m-d');
    	$this->calenderDiaries = CalenderDiary::where([['date', date('Y-m-d')], ['company_id', auth()->user()->company->id]])->get();
    	$calenderDiaryNote = CalenderDiaryNote::where('date', $this->current_date)->first();
    	if ($calenderDiaryNote) {
    		$this->note = $calenderDiaryNote->note;
    	}
        $monthDays = CarbonPeriod::create(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth());
        foreach ($monthDays as $key => $day) {
        	$this->dates[] = $day->format('Y-m-d');
        }
    }

    public function changeSchedul($year, $month, $day)
    {
    	$date = date('Y-m-d', strtotime($year.'-'.$month.'-'.$day));
    	$this->current_date = $date;
    	
    	$calenderDiaryNote = CalenderDiaryNote::where('date', $this->current_date)->first();
    	$this->reset('note');
    	if ($calenderDiaryNote) {
    		$this->note = $calenderDiaryNote->note;
    	}
    	
    	$this->calenderDiaries = CalenderDiary::where([['date', $date], ['company_id', auth()->user()->company->id]])->get();
    }

    public function updatedMonthYear()
    {
    	$date = date('d-m-Y', strtotime($this->month_year.'-01'));
    	$this->reset('dates');
    	$monthDays = CarbonPeriod::create(Carbon::parse($date)->startOfMonth(), Carbon::parse($date)->endOfMonth());
        foreach ($monthDays as $key => $day) {
            $this->dates[] = $day->format('Y-m-d');
        };
    }

    public function noteUpdate()
    {
    	$calenderDiaryNote = CalenderDiaryNote::where('date', $this->current_date)->first();    	
    	if($calenderDiaryNote) {
    		$calenderDiaryNote->note = $this->note;
    		$calenderDiaryNote->save();
    	} else {
	    	CalenderDiaryNote::create([
	    		'note' => $this->note,
	    		'date' => $this->current_date
	    	]);
    	}
        $this->alert('success', 'Note saved successfully!', [
            'position' => 'top-right',
            'toast' => true,
        ]);
    }
}