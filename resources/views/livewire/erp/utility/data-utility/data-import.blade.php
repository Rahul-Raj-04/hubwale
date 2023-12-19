<section>
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Utility</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Data Utility</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Import</li>
                    </ol>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="submit">
                        <h4>Data Import</h4>
                        <div class="border">
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="form-label">Zip File</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-2">
                                    <input type="file" class="form-control form-control-sm">
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
</section>