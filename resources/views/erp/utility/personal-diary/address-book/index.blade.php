@extends('erp.app')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Utility</a></li>
                        <li class="breadcrumb-item"><a href="">Personal diary</a></li>
                        <li class="breadcrumb-item"><a href="">Address Book</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.utility.personal-diary.address-book.create') }}" class="btn btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add Address Book
                            </a>

                            <a href="{{ route('erp.utility.personal-diary.address-book.create') }}" class="btn btn-primary d-sm-none me-0">
                                <i class="fas fa-plus"></i>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Name</th>
                                    <th class="bg-primary text-white">Contact person</th>
                                    <th class="bg-primary text-white">Email</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($addressBooks as $key => $addressBook)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $addressBook->name }}</td>
                                        <td>{{ $addressBook->contact_person }}</td>
                                        <td>{{ $addressBook->email }}</td>
                                        <td>
                                            <a href="{{route('erp.utility.personal-diary.address-book.edit', $addressBook->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                            <a href="{{route('erp.utility.personal-diary.address-book.show', $addressBook->id)}}" class="btn btn-sm btn-outline-success">Show</a>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $addressBook->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- modals --}}
                    @foreach ($addressBooks as $key => $addressBook)
                        <div class="modal fade" id="delete-modal-{{ $addressBook->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{route('erp.utility.personal-diary.address-book.destroy', $addressBook->id)}}" method="POST" class="btn">
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
        </div>
    </div>

@endsection

@section('customJs')
@endsection