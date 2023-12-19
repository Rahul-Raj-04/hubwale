<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">E-Commerce</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Permission</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </div>
            </div>

            <div class="card-body p-2">
                <div class="m-1 border">
                    <h4>Give Permission</h4>
                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $key => $item)
                                    <span>{{$key+1 }}. {{ $item }}</span><br>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6" wire:ignore>
                            <label class="form-label">Enter user mobile number</label>
                            <select class="form-control tom-select-with-create" wire:model.defer='mobileNumber' multiple>
                                <option value="">Type mobile number and hit enter</option>
                            </select>
                        </div>
    
                        <div class="col-md-12 my-3">
                            <button class="btn btn-primary" wire:click='savePermission'>Save</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom datatable-common">
                        <tr>
                            <th>Sr. No.</th>
                            <th>User Name</th>
                            <th>User Mobile</th>
                            <th>Permission Date</th>
                            <th>Remove</th>
                        </tr>
                        @foreach ($permissions as $key => $permission)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $permission->user ? $permission->user->name : '' }}</td>
                                <td>{{ $permission->mobile }}</td>
                                <td>{{ $permission->created_at}}</td>
                                <td><button class="btn btn-danger btn-sm" wire:click='removePermission({{ $permission->id }})'>Remove</button></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function tomSelectImplement() {
            new TomSelect('.tom-select-with-create', {
                plugins: {
                    remove_button:{
                        title:'Remove this item',
                    }
                },
                create: true,
            });
        }
        tomSelectImplement();
        window.addEventListener('top-select-implement', event => {
            tomSelectImplement();
        });
    </script>
</div>