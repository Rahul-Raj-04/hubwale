<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\Slab;

use Livewire\Component;
use App\Models\GstSlab;

class AddSlab extends Component
{
    public $gst_types = [];

    //Form fields
    public $gst_slab;
    public $gst_type;
    public $state_ut_tax;
    public $central_tax;
    public $integrated_tax;

    public function mount()
    {
        $this->gst_types = [
            'gst',
            'nil_rated',
            'non_gst',
            'Other',
        ];
    }

    public function saveSlab()
    {
        $rules = [
            'gst_slab' => 'required',
            'gst_type' => 'required|in:gst,nil_rated,non_gst,Other',
            'state_ut_tax' => 'required|regex:/[0-9]/|max:15',
            'central_tax' => 'required|regex:/[0-9]/|max:15',
            'integrated_tax' => 'required|regex:/[0-9]/|max:15',
        ];

        $this->validate($rules);

        GstSlab::create([
            'gst_slab' => $this->gst_slab,
            'gst_type' => $this->gst_type,
            'state_ut_tax' => $this->state_ut_tax,
            'central_tax' => $this->central_tax,
            'integrated_tax' => $this->integrated_tax,
            'company_id' => auth()->user()->company ? auth()->user()->company->id : null,
        ]);

        toast('GST slab created successfully!', 'success');

        return redirect()->route('erp.gst.slab.index');
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <form wire:submit.prevent="saveSlab">
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> GST Slab <i class="text-danger">*</i></label>
                            <input type="text" class="form-control form-control-sm @error('gst_slab') is-invalid @enderror" 
                                wire:model.defer="gst_slab" placeholder="Enter GST  slab" required>
                            @error('gst_slab')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> GST Type <i class="text-danger">*</i></label>
                            <select wire:model.defer='gst_type' class="form-control form-control-sm form-select @error('gst_type') is-invalid @enderror" required>
                                <option value="">Select GST type</option>
                                @foreach ($gst_types as $gst_type)
                                    <option value="{{ $gst_type }}">
                                    {{ $gst_type == 'gst' ? 'GST' : ($gst_type == 'nil_rated' ? 'Nil Rated' : ($gst_type == 'non_gst' ? 'Non GST' : $gst_type))}}
                                    </option>
                                @endforeach
                            </select>
                            @error('gst_type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> State Ut Tax <i class="text-danger">*</i></label>
                            <input type="number" class="form-control form-control-sm @error('state_ut_tax') is-invalid @enderror" 
                                wire:model.defer="state_ut_tax" placeholder="Enter State ui tax" required>
                            @error('state_ut_tax')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Central Tax <i class="text-danger">*</i></label>
                            <input type="number" class="form-control form-control-sm @error('central_tax') is-invalid @enderror" 
                                wire:model.defer="central_tax" placeholder="Enter Central tax" required>
                            @error('central_tax')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Integrated Tax <i class="text-danger">*</i></label>
                            <input type="number" class="form-control form-control-sm @error('integrated_tax') is-invalid @enderror" 
                                wire:model.defer="integrated_tax" placeholder="Enter Integrated tax" required>
                            @error('integrated_tax')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <input type="submit" id="slabFormSubmit" class="d-none">
                </form>
            </div>
        blade;
    }
}
