<section id="default-pdf-id-{{$pdf_id}}">
    <div class="container-fluid" id="main-pdf">
        <div class="overflow-hidden">
            {{-- main code start from here --}}
            <header class="d-flex justify-content-center align-item-center flex-column">
                <div class="mx-auto d-flex flex-column justify-content-center align-item-center">
                    <img src="{{ auth()->user()->company->logo }}" alt="Company Logo" style="height: 50px; width:50px;"
                        class="mx-auto">
                    <small class="h4">{{ auth()->user()->company->company_name }}</small>
                </div>
                <div class="mx-auto">
                    <small>{{ strtoupper(auth()->user()->company->full_address) }}</small>
                </div>
            </header>
            <hr style="height: 2px" />
            <div>
                @foreach ($products as $item)
                    <div class="card py-2 mb-3">
                        <div class="d-flex justify-content-evenly align-item-center">
                            <div class="col d-flex justify-content-center align-item-center">
                                <img src="{{ $item->image[0]->getUrl() }}" style="height: 200px">
                            </div>
                            <div class="col">
                                <table class="table">
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $item->name }}</td>
                                    </tr>
                                    @if ($item->brand)
                                        <tr>
                                            <th>Brand</th>
                                            <td>{{ $item->brand }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th>Price (per piece)</th>
                                        <td>{{ $item->price_per_piece }} ₹</td>
                                    </tr>
                                    @if ($item->price_per_package)
                                        <tr>
                                            <th>Price (per package)</th>
                                            <td>{{ $item->price_per_package }} ₹</td>
                                        </tr>
                                    @endif

                                    @if ($item->color)
                                        <tr>
                                            <th>Color</th>
                                            <td>{{ $item->color }}</td>
                                        </tr>
                                    @endif

                                    @if ($item->grade)
                                        <tr>
                                            <th>Grade</th>
                                            <td>{{ $item->grade }}</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section id="default-pdf-id-{{$pdf_id}}">