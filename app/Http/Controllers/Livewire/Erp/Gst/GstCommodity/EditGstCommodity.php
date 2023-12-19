<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstCommodity;

use Livewire\Component;
use App\Models\GstCommodity;
use App\Models\HsnSac;
use App\Models\GstSlab;

class EditGstCommodity extends Component
{
    public $commodity_types = [];
    public $hsn_sacs = [];
    public $gst_slabs = [];
    public $gstCommodity;

    //Form fields
    public $commodity_type;
    public $description;
    public $hsn_sac;
    public $gst_slab;
    public $applied_at;

    public function mount($id)
    {   
        $this->gstCommodity = GstCommodity::find($id);

        $this->commodity_type = $this->gstCommodity->commodity_type;
        $this->description = $this->gstCommodity->description;
        $this->hsn_sac = $this->gstCommodity->hsn_sac_id;
        $this->gst_slab = $this->gstCommodity->gst_slab_id;
        $this->applied_at = date('Y-m-d', strtotime($this->gstCommodity->applied_at));

        $this->hsn_sacs = HsnSac::all();
        $this->gst_slabs = GstSlab::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();

        $this->commodity_types = [
            'goods',
            'services',
        ];
    }

    public function saveSlab()
    {
        $rules = [
            'description' => 'required',
            'commodity_type' => 'required|in:goods,services',
            'hsn_sac' => 'required',
            'gst_slab' => 'required',
            'applied_at' => 'required',
        ];

        $this->validate($rules);

        $this->gstCommodity->update([
            'description' => $this->description,
            'commodity_type' => $this->commodity_type,
            'hsn_sac_id' => $this->hsn_sac,
            'gst_slab_id' => $this->gst_slab,
            'applied_at' => $this->applied_at,
        ]);

        toast('GST Commodity updated successfully!', 'success');

        return redirect()->route('erp.gst.gst-commodity.index');
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <form wire:submit.prevent="saveSlab">
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> GST Type <i class="text-danger">*</i></label>
                            <select wire:model.defer='commodity_type' class="form-control form-control-sm form-select @error('commodity_type') is-invalid @enderror" required>
                                <option value="">Select GST type</option>
                                @foreach ($commodity_types as $commodity_type)
                                    <option value="{{ $commodity_type }}">
                                    {{ ucfirst($commodity_type) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('commodity_type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Description <i class="text-danger">*</i></label>
                            <input type="text" class="form-control form-control-sm @error('description') is-invalid @enderror" 
                                wire:model.defer="description" placeholder="Enter GST  slab" required>
                            @error('description')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Hsn Sac <i class="text-danger">*</i></label>
                            <select wire:model.defer='hsn_sac' class="form-control form-control-sm form-select @error('hsn_sac') is-invalid @enderror" required>
                                <option value="">Select Hsn Sac</option>
                                @foreach ($hsn_sacs as $hsn_sac)
                                    <option value="{{ $hsn_sac->id }}">
                                    {{ $hsn_sac->number }}
                                    </option>
                                @endforeach
                            </select>
                            @error('hsn_sac')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Gst Slab <i class="text-danger">*</i></label>
                            <select wire:model.defer='gst_slab' class="form-control form-control-sm form-select @error('gst_slab') is-invalid @enderror" required>
                                <option value="">Select GST type</option>
                                @foreach ($gst_slabs as $gst_slab)
                                    <option value="{{ $gst_slab->id }}">
                                    {{ ucfirst($gst_slab->gst_slab) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('gst_slab')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Applied At <i class="text-danger">*</i></label>
                            <input type="date" class="form-control form-control-sm @error('applied_at') is-invalid @enderror" 
                                wire:model.defer="applied_at" required>
                            @error('applied_at')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <input type="submit" id="gstCommodityFormSubmit" class="d-none">
                </form>
            </div>
        blade;
    }
}
