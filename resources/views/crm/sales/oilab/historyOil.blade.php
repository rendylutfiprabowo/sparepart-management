@extends('template.salesCrm')
@section('title', 'Oil Sales History')
@section('contents')

    <x-page-heading>
        History Hasil Pengetesan
    </x-page-heading>
    <br>

    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
                <div class="card-body shadow">
                    <div class="row">
                        <div class="col-6">
                            <div class="text-merah"><strong>No So</strong></div>
                            <div class="text-black"><strong>123</strong></div>
                        </div>
                        <div class="col-6">
                            <div class="text-merah"><strong>Project</strong></div>
                            <div class="text-black"><strong>123</strong></div>
                        </div>
                        <div class="col-6">
                            <div class="text-merah"><strong>Customer Name</strong></div>
                            <div class="text-black"><strong>123</strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-merah"><strong>Sales Name</strong></div>
                            <div class="text-black"><strong>-</strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div>
        <div class="accordion shadow-sm accordion-flush" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Accordion Item #1
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse
                        plugin adds the appropriate classes that we use to style each element. These classes control the
                        overall
                        appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with
                        custom CSS or overriding our default variables. It's also worth noting that just about any HTML can
                        go
                        within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Accordion Item #2
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the
                        collapse
                        plugin adds the appropriate classes that we use to style each element. These classes control the
                        overall
                        appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with
                        custom CSS or overriding our default variables. It's also worth noting that just about any HTML can
                        go
                        within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Accordion Item #3
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                        collapse
                        plugin adds the appropriate classes that we use to style each element. These classes control the
                        overall
                        appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with
                        custom CSS or overriding our default variables. It's also worth noting that just about any HTML can
                        go
                        within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
        </div>

    </div>


//batas
    <div class="p-3 bg-white rounded shadow-sm">
        <table class="table table-bordered  align-middle text-center" id="dataTable" width="100%" cellspacing="0">
            <thead class="text-center">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Serial Number</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Lihat</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($customers as $no => $customer)
                    @if($customer->trafos)
                    @foreach ($customer->trafos as $key => $trafo)
                        <tr>
                            @if ($key == 0)
                                <td rowspan="{{ $customer->trafos->count() }}">{{ $no + 1 }}</td>
                                <td rowspan="{{ $customer->trafos->count() }}">{{ $customer->nama_customer }}</td>
                            @endif
                            <td> {{ $trafo->serial_number }}</td>
                            <td> {{ $trafo->merk }}</td>
                            <td> {{ $trafo->year }}</td>
                            <td> <a href="/sales/oil/history/{{$trafo->id_trafo}}" class="btn btn-danger"> Detail </a> </td>
                        </tr>
                    @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
