@extends('template.salesCrm')

@section('title', 'Sales Customers')

@section('contents')
    <x-page-heading>
        Dashboard Customers
    </x-page-heading>
    <br>
    <div>
        {{-- TABLE OF CUSTOMERS --}}
        <div class="table-responsive mt-3 bg-white p-4 rounded shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCustModal">
                        + Customer
                    </button>
                </div>
                <div>
                    <form action="{{ route('searchCustomer') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control shadow-sm " placeholder="Cari customer..."
                                name="keyword" value="{{ $keyword }}" style="background: #DDDDDD;">
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
                        <th>Nama Customer</th>
                        <th>No Hp</th>
                        <th>Email</th>
                        <th>Jenis Usaha</th>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Data Customer</h1>
                    <button type="button" class="btn-close text-danger" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-2">
                        <form class="needs-validation" action="{{ route('addCust') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="idCustomer" class="form-label">ID CUSTOMER</label>
                                    <input type="text" class="form-control" id="idCustomer" name="id_customer" required>
                                </div>
                                <div class="col-12">
                                    <label for="namaCustomer" class="form-label">Nama Customer</label>
                                    <input type="text" class="form-control" id="namaCustomer" name="nama_customer"
                                        required>
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone </label>
                                    <input type="text" class="form-control" id="phone" name="phone_customer">
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email </label>
                                    <input type="email" class="form-control" id="email" name="email_customer">
                                </div>
                                <div class="col-12">
                                    <label for="Jenis Usaha" class="form-label">Jenis Usaha </label>
                                    <input type="text" class="form-control" id="JenisUsaha"
                                        name="jenisusaha_customer">
                                </div>
                            </div>
                            <br>
                            <div>
                                <button class=" btn btn-outline-danger w-100 " type="submit">Submit</button>
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
