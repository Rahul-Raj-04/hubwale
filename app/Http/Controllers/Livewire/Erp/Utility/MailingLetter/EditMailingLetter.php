<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\MailingLetter;

use Livewire\Component;
use App\Enum\Enum;
use App\Models\MailingLetter;

class EditMailingLetter extends Component
{
	public $allFields;
	public $selected_field;
	public $name;
	public $addField = [];
	public $new_field = [];
	public $mailingLetter;

    public function render()
    {
        return view('livewire.erp.mailing-letter.edit-mailing-letter');
    }

    public function mount($mailingLetter)
    {
    	$this->mailingLetter = $mailingLetter;
    	$this->name = $mailingLetter->name;
    	$this->allFields = Enum::MAILING_LETTER_FIELD;
    	$fields = json_decode($mailingLetter->custom_fields);
    	foreach ($this->allFields as $key1 => $values) {
    		foreach ($values as $field => $lable) {
    			foreach ($fields as $key => $existingField) {
		    		if ($field == $existingField->field_name) {
    					$this->addField[] = ['lable' => $lable, 'field_name' => $existingField->field_name, 'field_value' => $existingField->field_value];
    					$this->new_field[$existingField->field_name] = $existingField->field_value;
		    			unset($this->allFields[$key1][$field]);
		    		}
	    		}
    		}
    	}
    }

    public function addNewField()
    {
        $this->validate(
            ['selected_field' => 'required'],
            ['selected_field.required' => 'Please select field.']);
        
    	foreach ($this->allFields as $key1 => $values) {
    		foreach ($values as $field_name => $lable) {
	    		if ($field_name == $this->selected_field) {
	    			$this->addField[] = ['lable' => $lable, 'field_name' => $field_name];
	    		}
    		}
    	}
        $this->reset('selected_field');
    }

    public function submit()
    {
    	$this->validate([
    		'name' => 'required',
    		]);
    	if ($this->new_field){
	    	foreach ($this->new_field as $field => $value) {
	    		if($value){
	    			$data[] = ['field_name' => $field, 'field_value' => $value];
	    		}
	    	}
	    }
    	$this->mailingLetter->name = $this->name;
    	$this->mailingLetter->custom_fields = json_encode($data);
    	$this->mailingLetter->company_id = auth()->user()->company->id;
    	$this->mailingLetter->save();
    	toast('Mailing letter updated successfully!', 'success');

        return redirect()->route('erp.utility.personal-diary.mailing-letter.index');
    }
}
