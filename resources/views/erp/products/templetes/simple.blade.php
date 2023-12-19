<section id="simple-pdf-id-{{$pdf_id}}">
    <div class="container-fluid">
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
                        <figure class="figure">
                          <img src="{{$item->image[0]->getUrl()}}" class="figure-img img-fluid" style="height: 200px;width: 200px">
                          <figcaption class="figure-caption text-center">{{$item->name}}</figcaption>
                        </figure>
                        <figure class="figure">
                          <img src="{{$item->image[0]->getUrl()}}" class="figure-img img-fluid" style="height: 200px;width: 200px">
                          <figcaption class="figure-caption text-center">{{$item->name}}</figcaption>
                        </figure>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section id="simple-pdf-id-{{$pdf_id}}">
