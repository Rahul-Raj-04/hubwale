<section>
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Utility</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Advance Utility</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Voucher Renumber</li>
                    </ol>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="submit">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Vou Type</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control form-control-sm">
                                    @foreach($voutypes as $voutype)
                                        <option value="{{$voutype}}">{{$voutype}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Old Prefix</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control form-control-sm">
                                    <option value="BP/">BP/</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">New Prifix</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Starting Date</label>
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control form-control-sm">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Ending Date</label>
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control form-control-sm">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Starting Number</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control form-control-sm">
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
</section>