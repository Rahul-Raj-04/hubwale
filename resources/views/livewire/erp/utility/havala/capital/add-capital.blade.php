<section>
<!--app-content open-->
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Utility</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Havala</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Capital</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">                            
                            <a href="{{route('erp.utility.havala.capital.index')}}" class="btn btn-default btn-sm d-none d-sm-inline-block mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i>{{ __('lang.cancel') }}</a>    
                        </div>
                    </div>
                </div>
                <div class="card-body p-3" style="height: 500px;overflow-y: scroll;">
                    <div class="row">
                        <div class="col-md-3 border" style="height: 500px;overflow-y: scroll;">
                            <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                                <li role="presentation">
                                    <h4 class="ps-5"><b>Havala Type</b></h4>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" style="width: 100%" id="capital-tab" data-bs-toggle="tab" data-bs-target="#capital-tab-pane" type="button" role="tab" 
                                     aria-controls="capital-tab-pane" aria-selected="true">Capital
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="intrest-tab" data-bs-toggle="tab" data-bs-target="#intrest-tab-pane" type="button" role="tab" 
                                     aria-controls="intrest-tab-pane" aria-selected="true">Intrest %
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="depreciation-tab" data-bs-toggle="tab" data-bs-target="#depreciation-tab-pane" type="button" role="tab" 
                                     aria-controls="depreciation-tab-pane" aria-selected="true">Depreciation
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content col-md-9 border" id="myTabContent" style="height: 500px;overflow-y: scroll;">
                            <div class="tab-pane fade show active" id="capital-tab-pane" role="tabpanel" aria-labelledby="capital-tab" tabindex="0">
                                <table class="table table-bordered text-nowrap border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="bg-primary text-white">Account Name</th>
                                            <th class="bg-primary text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Test</td>
                                            <td>
                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-edit text-azure"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-outline-danger">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </apan>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade show" id="intrest-tab-pane" role="tabpanel" aria-labelledby="intrest-tab" tabindex="0">
                                <table class="table table-bordered text-nowrap border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="bg-primary text-white">Account Name</th>
                                            <th class="bg-primary text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Test 2</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-outline-info">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                        <i class="fas fa-edit text-azure"></i>
                                                    </apan>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-outline-danger">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </apan>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade show" id="depreciation-tab-pane" role="tabpanel" aria-labelledby="depreciation-tab" tabindex="0">
                                <table class="table table-bordered text-nowrap border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="bg-primary text-white">Account Name</th>
                                            <th class="bg-primary text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Test 3</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-outline-info">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                        <i class="fas fa-edit text-azure"></i>
                                                    </apan>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-outline-danger">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </apan>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none mt-5 pe-0">
                        <div class="btn-list">
                            <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                                <i class="fas fa-plus me-1"></i>
                                Add
                            </a>
                            <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                                <i class="fa fa-print me-0"></i>
                                Print
                            </a>
                        </div>
                    </div>               
                </div>
            </div>
        </div>
    </div>
</section>