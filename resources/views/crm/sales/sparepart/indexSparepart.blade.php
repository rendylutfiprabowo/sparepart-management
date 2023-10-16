@extends('template.salesCrm')

@section('title', 'SpareParts Dashboard ')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 text-danger font-weight-bold mb-0">SparePart Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Export</a>
        </div>

        <div class="row cols-2">
            <div class="col d-sm-flex justify-content-center rounded bg-white p-1 shadow-sm">
                <div class="p-2">
                    <i class="fa-solid fa-2x fa-circle-exclamation"></i>
                </div>

                <div class="">
                    <table class="table-sm table-borderless table">
                        <tbody>
                            <tr>
                                <th scope="row">Customer Name </th>
                                <td>: Edo Laksana Batch 6</td>

                            </tr>
                            <tr>
                                <th scope="row">Order Number </th>
                                <td>: 5858588585</td>

                            </tr>
                            <tr>
                                <th scope="row">Order Date</th>
                                <td>: 19-09-2022</td>

                            </tr>
                            <tr>
                                <th scope="row">Address</th>
                                <td>: Lampung Ujung Utara, Tanggamus, Kota Lampung Rt09/Rw7</td>
                            </tr>
                            <tr>
                                <th scope="row">Store</th>
                                <td>: TRS-01</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">
                <div class="col mb-3 rounded bg-white p-2 shadow-sm">
                    <h3>Booking Status</h3>
                    <hr>
                    <div class="badge-primary badge">
                        <h5>In Progress</h5>
                    </div>
                </div>
                <div class="col rounded bg-white p-4 shadow-sm">
                    <h3>Total Item</h3>
                    <div class="badge badge-danger">
                        <h5>55</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
