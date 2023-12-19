<?php

namespace App\Http\Controllers\Livewire\Erp\Transaction\PurchaseEntry\ChequeFromPurchase;

use Livewire\Component;

class AddChequeFromPurchase extends Component
{
	public function mount()
	{
	}

	public function submit()
	{
	}

    public function render()
    {
        return <<<'blade'
            <div>
                <form>
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <label class="form-label"> Bill Date <i class="text-danger">*</i></label>
                            <input type="date" class="form-control form-control-sm @error('bill_date') is-invalid @enderror" 
                                name="bill_date" required>
                            @error('bill_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"> Cheque Date <i class="text-danger">*</i></label>
                            <input type="date" class="form-control form-control-sm @error('cheque_date') is-invalid @enderror" 
                                name="cheque_date" required>
                            @error('cheque_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"> Bank Account <i class="text-danger">*</i></label>
                            <select name='bank_account' class="form-control form-control-sm form-select @error('bank_account') is-invalid @enderror" required>
                                <option value="">Select Bank Account</option>
                            </select>
                            @error('bank_account')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"> Balance <i class="text-danger">*</i></label>
                            <input type="number" class="form-control form-control-sm @error('balance') is-invalid @enderror" 
                                name="balance" placeholder="0.00" value="0.00" required>
                            @error('balance')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </form>
                <hr>
                <!-- <div class="table-responsive"> -->
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">No</th>
                                <th class="bg-primary text-white">Cheque No</th>
                                <th class="bg-primary text-white">Date</th>
                                <th class="bg-primary text-white">Party Name</th>
                                <th class="bg-primary text-white">Balance</th>
                                <th class="bg-primary text-white">Amount</th>
                                <th class="bg-primary text-white">Pending</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                <!-- </div> -->
            </div>
        blade;
    }
}
