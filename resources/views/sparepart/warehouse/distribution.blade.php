@extends('template.warehouseSparepart')

@section('title', 'Tools Warehouse')
@section('contents')
    <div class="col-md-12">
        <div class="card rounded-4 mb-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Distribution Warehouse
                    </h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
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
                        <th scope="col">Status</th>
                        <th scope="col">Order date</th>
                        <th scope="col">Received date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($distribution as $no => $dis)
                        <tr>
                            <td class="table-plus">{{ $no + 1 }}</td>
                            <td class="table-plus">{{ $dis->stock->sparepart->category->nama_category }}</td>
                            <td class="table-plus">{{ $dis->qty_distribution }}</td>
                            <td class="table-plus">{{ $dis->stock->store_sparepart->nama_store }}</td>
                            <td class="table-plus">
                                <b
                                    class="@if ($dis->status == 'closed') badge text-bg-success
                            @elseif ($dis->status == 'on-progress') badge text-bg-primary
                            @elseif($dis->status == 'waiting for approval')
                            badge text-bg-warning
                            @elseif($dis->status == 'rejected')
                            badge text-bg-danger @endif">{{ $dis->status }}
                                </b>
                            </td>
                            <td class="table-plus">{{ $dis->order_date }}</td>
                            <td class="table-plus">{{ $dis->recieved_date }}</td>
                            <td class="table-plus">
                                @if ($dis->status == 'waiting for approval')
                                    <div class="d-flex justify-content-center">
                                        <div>
                                            <form method="post"
                                                action="/warehouse/distribution/{{ $dis->id_distribution }}">
                                                @csrf
                                                <input type="hidden" name="status" value="on-progress">
                                                <button type="submit" class="btn btn-link"><i
                                                        class="fa-solid fa-circle-check"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div>

                                            <form method="post" action="#">
                                                @csrf
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="btn btn-link"><i
                                                        class="fa-regular fa-circle-xmark"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
