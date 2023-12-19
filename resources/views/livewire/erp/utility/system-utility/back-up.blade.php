<section>
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Utility</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">System Utility</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Backup</li>
                    </ol>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="submit">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Select</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm">
                                            <option value="Company">Company</option>
                                            <option value="Year">Year</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Backup</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm">
                                            <option value="Internal">Internal</option>
                                            <option value="Other Path">Other Path</option>
                                            <option value="E-mail">E-mail</option>
                                            <option value="Multi location">Multi location</option>
                                            <option value="Other Path">G-Drive</option>
                                            <option value="Other Path">Send for Support</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Year List</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control form-control-sm">
                                    <option value="Internal">1 | 01/4/2016 | 31/3/2017</option>
                                </select>
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