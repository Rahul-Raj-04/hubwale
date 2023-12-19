<section>
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Utility</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Advance Utility</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Account Merge</li>
                    </ol>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="submit">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Source</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control form-control-sm">
                                    @foreach($accounts as $account)
                                        <option value="{{$account->id}}">{{$account->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Destination</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control form-control-sm">
                                    @foreach($accounts as $account)
                                        <option value="{{$account->id}}">{{$account->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Delete Source</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control form-control-sm">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Merge Opening Balance</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control form-control-sm">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
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