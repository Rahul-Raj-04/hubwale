<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\SalesSetup;

use Livewire\Component;
use App\Enum\Enum;
use App\Models\GstSalesSetup;

class IndexSalesSetup extends Component
{
	public $type;
	public $invoice_types;
	public $invoice_type;
	public $gstSalesSetups = [];

	public function mount($type)
	{
		$this->type = $type;
		$this->invoice_type = Enum::MASTER_GST_INVOICE_TYPE[0];

		if ($this->type == 'sale_setup') {
            $this->gstSalesSetups  = GstSalesSetup::Where([['company_id', auth()->user()->company ? auth()->user()->company->id : null], ['module', 'sale_setup'], ['invoice_type', $this->invoice_type]])->get();
        } elseif ($this->type == 'purchase_setup') {
            $this->gstSalesSetups  = GstSalesSetup::Where([['company_id', auth()->user()->company ? auth()->user()->company->id : null], ['module', 'purchase_setup'], ['invoice_type', $this->invoice_type]])->get();
        }
        $this->invoice_types = Enum::MASTER_GST_INVOICE_TYPE;
	}

	public function updatedInvoiceType()
	{
		if ($this->type == 'sale_setup') {
            $this->gstSalesSetups  = GstSalesSetup::Where([['company_id', auth()->user()->company ? auth()->user()->company->id : null], ['module', 'sale_setup'], ['invoice_type', $this->invoice_type]])->get();
        } elseif ($this->type == 'purchase_setup') {
            $this->gstSalesSetups  = GstSalesSetup::Where([['company_id', auth()->user()->company ? auth()->user()->company->id : null], ['module', 'purchase_setup'], ['invoice_type', $this->invoice_type]])->get();
        }	
		$this->dispatchBrowserEvent('entry-table');
	}

    public function render()
    {
    	return <<<'blade'
        	<div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ Request::get('type') == 'sale_setup' ? 'Sales Setup' : 'Purchase Setup' }}</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.gst.sales-setup.create', ['type' => $type]) }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                {{ ucfirst(str_replace( '_', ' ', $type)) }}
                            </a>

                            <a href="{{ route('erp.master.gst.sales-setup.create', ['type' => $type]) }}" class="btn btn-sm btn-primary d-sm-none me-0">
                                <i class="fas fa-plus"></i>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="card-body p-3">
                    <div class="row">
                        <div class="form-group col-md-6  mb-4">
                            <label for="type" class="form-label">Invoice Type</label>
                            <select class="form-control form-control-sm form-control form-control-sm-sm form-select" name="invoice_type" wire:model="invoice_type">
                                <option value="">Select Invoice Type</option>
                                @foreach($invoice_types as $invoice_type)
                                	<option value="{{ $invoice_type }}">{{$invoice_type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6  mb-4 d-none">
                            <label for="type" class="form-label">Trending A/C.</label>
                            <select class="form-control form-control-sm form-select" name="trending_ac" id="trending_ac" required>
                                <option value="">Select Trending Account</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered text-nowrap border-bottom entry-table">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Type</th>
                                    <th class="bg-primary text-white">Type List</th>
                                    <th class="bg-primary text-white">Sale/Purc A/c.</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               	@foreach ($gstSalesSetups as $key => $gstSalesSetup)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $gstSalesSetup->type == 'default' ? 'Default' : ($gstSalesSetup->type == 'gst_commodity' ? 'Gst Commodity' : $gstSalesSetup->type) }}</td>
                                        <td>{{ $gstSalesSetup->gst_commodity ? $gstSalesSetup->gst_commodity->description : '-' }}</td>
                                        <td>{{ $gstSalesSetup->sales_purchase_ac ? $gstSalesSetup->sales_purchase_ac->name : '-' }}</td>
                                        <td>
                                            <a href="{{route('erp.master.gst.sales-setup.edit', ['id' =>  $gstSalesSetup->id, 'type' => $type])}}" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-outline-success d-none">Show</a>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $gstSalesSetup->id }}">
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <!-- </div> -->

                    {{-- modals --}}
                    @foreach ($gstSalesSetups as $key => $gstSalesSetup)
                        <div class="modal fade" id="delete-modal-{{ $gstSalesSetup->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{route('erp.master.gst.sales-setup.destroy', ['id'=> $gstSalesSetup->id, 'type' => $type])}}" method="POST" class="btn">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Delete" class="btn btn-danger pd-x-25">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        blade;
    }
}
