<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\MailingLetter;

use Livewire\Component;
use App\Enum\Enum;
use App\Models\MailingLetter;

class AddMailingLetter extends Component
{
	public $allFields;
	public $selected_field;
	public $name;
	public $addField = [];
	public $new_fields = [];

    public function render()
    {
        return view('livewire.erp.mailing-letter.add-mailing-letter');
    }

    public function mount()
    {
    	$this->allFields = Enum::MAILING_LETTER_FIELD;
    }

    public function addNewField()
    {
    	foreach ($this->allFields as $values) {
    		foreach ($values as $field_name => $lable) {
	    		if ($field_name == $this->selected_field) {
	    			$this->addField[$field_name] = $lable;
	    		}
    		}
    	}
        $this->reset('selected_field');
    }

    public function removeField($key)
    {
        unset($this->addField[$key]);
    }

    public function submit()
    {
    	$this->validate([
    		'name' => 'required',
    		]);
    	$data = [];
    	if ($this->new_fields){
	    	foreach ($this->new_fields as $field => $value) {
	    		$data[] = ['field_name' => $field, 'field_value' => $value];
	    	}
	    }
    	MailingLetter::create([
    		'name' => $this->name,
    		'custom_fields' => json_encode($data),
    		'company_id' => auth()->user()->company->id
    	]);

    	toast('Mailing letter created successfully!', 'success');

        return redirect()->route('erp.utility.personal-diary.mailing-letter.index');
    }
}
