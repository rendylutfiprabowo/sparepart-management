@extends('template.warehouseBranchSparepart')

@section('title', 'Tools Warehouse')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded-4 mb-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Tools Warehouse {{ $namaStore }}
                    </h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="row mb-2">
                <div class="col-md-3">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addproduct" href="#"><i
                            class="fa-solid fa-plus"></i> Add Tools</a>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($tools as $no => $tool)
                        <tr>
                            <td class="table-plus">{{ $no + 1 }}</td>
                            <td class="table-plus">{{ $tool->nama_tools }}</td>
                            <td class="table-plus">{{ $tool->qty_tools }}</td>
                            <td class="table-plus">{{ $tool->store->nama_store }}</td>
                            {{-- @dd($stock->sparepart) --}}
                            <td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Request Tools Warehouse
                        {{ $namaStore }}
                    </h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="row mb-2">
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Technician</th>
                        <th scope="col">Items</th>
                        <th scope="col">Qty</th>
                        <th scope="col">status</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Finish Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($reqTools as $no => $req)
                        <tr>
                            <td class="table-plus">{{ $no + 1 }}</td>
                            <td class="table-plus">{{ $req->technician->nama_technician }}</td>
                            <td class="table-plus">{{ $req->tools->nama_tools }}</td>
                            <td class="table-plus">{{ $req->qty_technician_tools }}</td>
                            <td class="table-plus"><b
                                    class="@if ($req->status == 'closed') badge text-bg-success
                            @elseif ($req->status == 'closed-memo-do-revisi' || $req->status == 'memo-closed') badge text-bg-primary
                            @elseif($req->status == 'on-warehouse' || $req->status == 'on-technician')
                            badge text-bg-warning
                            @elseif($req->status == 'revisi')
                            badge text-bg-info
                            @elseif($req->status == 'canceled')
                               badge text-bg-danger @endif">{{ $req->status }}
                                </b></td>
                            <td class="table-plus">{{ $req->start_date }}</td>
                            <td class="table-plus">{{ $req->finish_date ? $req->finish_date : '-' }}</td>
                            <td class="table-plus">
                                <div class="d-flex justify-content-center">
                                    <div>
                                        @if ($req->status == 'waiting')
                                            <form method="post" action="/warehouse/tools/validasi/{{ $req->id_tools }}">
                                                @csrf
                                                <input type="hidden" name="status" value="on-technician">
                                                <button type="submit" class="btn btn-link"><i
                                                        class="fa-solid fa-circle-check"></i>
                                                </button>
                                            </form>
                                    </div>
                                    <div>

                                        <form method="post" action="/warehouse/tools/validasi/{{ $req->id_tools }}">
                                            @csrf
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" class="btn btn-link"><i
                                                    class="fa-regular fa-circle-xmark"></i></button>
                                        </form>
                                    </div>
                                @elseif($req->status == 'return')
                                    <form method="post" action="/warehouse/tools/validasi/{{ $req->id_tools }}">
                                        @csrf
                                        <input type="hidden" name="status" value="closed">
                                        <button type="submit" class="btn btn-success">Accept
                                        </button>
                                    </form>
                    @endif
        </div>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    </div>
    <!--Add Product Modal -->
    <div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="addproductLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header merah text-putih">
                    <h5 class="modal-title" id="exampleModalLabel">Add Tools</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/warehouse/branch/stock/store">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <div class="alert-title">
                                        <h4>Whoops!</h4>
                                    </div>
                                    There are some problems with your input.
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div class="form-group mb-3">
                                <label class="form-label">Tools Name</label>
                                <input type="text" class="form-control" name="nama_tools"
                                    value="{{ old('nama_tools') }}" placeholder="Masukkan Nama Tools">
                            </div>
                            <div class="form-group mb-3">
                                <input hidden type="text" class="form-control" name="id_store"
                                    value="{{ $id_store }}" placeholder="Masukkan Nama Tools">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
