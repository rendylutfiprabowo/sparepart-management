@extends('template.salesCrm')
@section('title', 'Revision SpareParts')
@section('content')
    <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Stock Warehouse & Store</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>

            <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">DO/Memo DO</th>
                        <th scope="col">No. SPK</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach (range(1, 10) as $i)
                        <tr>
                            <td class="table-plus">{{ $i }}</td>
                            <td class="table-plus">Erlangga Maman Agus</td>
                            <td class="table-plus text-danger">Rejected</td>
                            <td class="table-plus">DO</td>
                            <td class="table-plus">03SA0039214</td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <a href="" class="pdf-link " type="button">
                                            <i class="fa-solid fa-square-check fa-lg"></i>
                                        </a>
                                    </div>

                                    <div class="col">
                                        <a href="" class="pdf-link " type="button">
                                            <i class="fa-solid fa-file fa-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
