<section>
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Utility</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Data Freeze</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Freeze</li>
                    </ol>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="submit">
                        <h4>Export To</h4>
                        <div class="border">
                            <div class="row">
                                <div class="col-md-3 border">
                                    <div>
                                        <input type="radio" value="internal">
                                        <label>Internal</label>
                                    </div>
                                    <div>
                                        <input type="radio" value="other">
                                        <label>Other</label>
                                    </div>
                                    <div>
                                        <input type="radio"  value="email">
                                        <label>E mail</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <input type="text" class="form-control form-control-sm">
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control form-control-sm">
                                    </div>
                                    <div class="row">
                                        <input type="text" class="form-control form-control-sm"> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Zip File</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Export Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm">
                                            <option value="Masters">Masters</option>
                                            <option value="Masters">Transaction</option>
                                            <option value="Masters">Address Book</option>
                                            <option value="Masters">Process</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Group Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model="account_group_name">
                                                <option value="All">All</option>
                                                <option value="Selected">Selected</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Area Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model="account_area_name">
                                                <option value="All">All</option>
                                                <option value="Selected">Selected</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">City Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model="account_city_name">
                                                <option value="All">All</option>
                                                <option value="Selected">Selected</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Account Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model="account_name">
                                                <option value="All">All</option>
                                                <option value="Selected">Selected</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Group</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model="product_group_name">
                                                <option value="All">All</option>
                                                <option value="Selected">Selected</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Category</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model="product_category_name">
                                                <option value="All">All</option>
                                                <option value="Selected">Selected</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Product Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model="product_name">
                                                <option value="All">All</option>
                                                <option value="Selected">Selected</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="mt-3">
                                <a class="btn btn-sm btn-primary">Ok</a>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
    <div class="modal fade" id="account_group" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Group Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <select class="form-control form-control-sm">
                                @foreach($account_groups as $account_group)
                                    <option value="{{ $account_group->id }}">{{$account_group->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" id="addCategoryButton" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto modalCloseButton" data-bs-dismiss="modal">Close</button>
                    <label for="addCategoryButton" class="btn btn-primary">Ok</label>
                </div>
            </div>
        </div>
    </div>
    
    <!-- @if($account_group_name == 'Selected') -->
        <script>
            $(document).ready(function() {
                ('#account_group').modal('show');
            });
        </script>
    <!-- @endif -->
</section>