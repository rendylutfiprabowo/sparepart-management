@extends('template.salesCrm')

@section('title', 'Sales Customers')

@section('contents')
    <x-page-heading>
        Dashboard Customers
    </x-page-heading>
    <div>
        {{-- TABLE OF CUSTOMERS --}}
        <div class="table-responsive bg-white p-4 rounded shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCustModal">
                        Customer +
                    </button>
                </div>
                <div>
                    <form action="{{ route('searchCustomer') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control " placeholder="Search" name="keyword"
                                value="{{ $keyword }}">
                            <button class="btn btn-danger " style=" position: absolute; right: 0; z-index: 0;"
                                type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>ID Customer</th>
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Types of business</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($dataCust) > 0)
                        @foreach ($dataCust as $dataTable)
                            <tr>
                                <td class="text-center">{{ $loop->index + $dataCust->firstItem() }}</td>
                                <td>{{ $dataTable->id_customer }}</td>
                                <td><a class="text-dark fw-bold text-decoration-none link-danger"
                                        href="{{ url('/sales/customer/' . $dataTable->id_customer) }}">{{ $dataTable->nama_customer }}</a>
                                </td>
                                <td>{{ $dataTable->phone_customer }}</td>
                                <td>
                                    {{ $dataTable->email_customer }}
                                </td>
                                <td>{{ $dataTable->jenisusaha_customer }}</td>
                            </tr>
                        @endforeach
                    @else
                        <div class="text-center">
                            <p class="text-secondary">Customer tidak ditemukan...</p>
                        </div>

                    @endif
                </tbody>
            </table>

            {{-- PAGINATE LINK TABLE  --}}
            <nav aria-label="Page navigation example">
                <ul class="pagination ">
                    @if ($dataCust->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="Previous">
                            <span class="page-link" aria-hidden="true">&laquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $dataCust->previousPageUrl() }}" rel="prev"
                                aria-label="Previous">&laquo;</a>
                        </li>
                    @endif

                    @for ($i = 1; $i <= $dataCust->lastPage(); $i++)
                        <li class="page-item {{ $dataCust->currentPage() == $i ? 'active ' : '' }}">
                            <a class="page-link" style=" position: relative; left: 0; z-index: 0;"
                                href="{{ $dataCust->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    @if ($dataCust->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $dataCust->nextPageUrl() }}" rel="next"
                                aria-label="Next">&raquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="Next">
                            <span class="page-link" aria-hidden="true">&raquo;</span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>

    <!-- MODAL FORM ADD CUSTOMERS -->
    <div class="modal fade" id="addCustModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-secondary" id="exampleModalLabel">Please add customer data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-4">
                        <form class="needs-validation" action="{{ route('addCust') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="idCustomer" class="form-label ">ID Customer *</label>
                                    <input type="text" class="form-control border border-1" id="idCustomer"
                                        name="id_customer" style="background-color: #EEEEEE;" required>
                                </div>
                                <div class="col-12">
                                    <label for="namaCustomer" class="form-label ">Customer Name *</label>
                                    <input type="text" class="form-control border border-1" id="namaCustomer"
                                        name="nama_customer" style="background-color: #EEEEEE;" required>
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label ">Phone </label>
                                    <input type="text" class="form-control border border-1" id="phone"
                                        name="phone_customer" style="background-color: #EEEEEE;">
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label ">Email </label>
                                    <input type="email" class="form-control " id="email" name="email_customer"
                                        style="background-color: #EEEEEE;">
                                </div>
                                <div class="col-12">
                                    <label for="Jenis Usaha" class="form-label ">Type Of Business </label>
                                    <input type="text" class="form-control border border-1" id="JenisUsaha"
                                        name="jenisusaha_customer" style="background-color: #EEEEEE;">
                                </div>
                            </div>
                            <br>
                            <div>
                                <button class=" btn btn-danger w-100 " type="submit">Submit</button>
                            </div>
                            @if (session('status'))
                                <div id="trigger"></div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
