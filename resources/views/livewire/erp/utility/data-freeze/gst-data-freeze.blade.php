<section>
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Utility</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Data Freeze</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gst Data Freeze</li>
                    </ol>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="submit">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label">Select Period</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select class="form-control form-control-sm">
                                            <option value="monthly">Monthly</option>
                                            <option value="annual">Annual</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label">For</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select class="form-control form-control-sm">
                                            <option value="Apr">Apr</option>
                                            <option value="May">May</option>
                                            <option value="Jun">Jun</option>
                                            <option value="Jul">Jul</option>
                                            <option value="Aug">Aug</option>
                                            <option value="Sep">Sep</option>
                                            <option value="Oct">Oct</option>
                                            <option value="Nov">Nov</option>
                                            <option value="Dec">Dec</option>
                                            <option value="Jan">Jan</option>
                                            <option value="Feb">Feb</option>
                                            <option value="Mar">Mar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row border mt-3">
                        <h5>GST Data Freeze</h5>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Start Date</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">End Date</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="mt-3">
                                <a class="btn btn-sm btn-primary">Ok</a>
                                <a class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal-category">Set Password</a>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
    <div class="modal fade" id="modal-category" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Password</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>ReType Password</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control form-control-sm">
                            </div>
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
</section>