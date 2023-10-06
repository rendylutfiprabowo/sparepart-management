@extends('template.salesCrm')
@section('content')

<p style="font-size: 23px; color: black;">HISTORY HASIL PENGETESAN</p>
<div class="row">
    <div class="col-md-12">
        <div class="card rounded-4" style="border-left-color: red; border-left-width: 10px;">
            <div class="card-body shadow">
                <h6 class="text-start font-weight-bold " style="color: black;">Seluruh history Form report yang sudah complete ditampilkan pada halaman ini. </h6>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <div class="card p-4 rounded-4">
            <thead>
                <tr>
                    <h3 class="text-start text-dark my-4" style="font-weight: bold;">Daftar Form Report</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <table class=" text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No seri</th>
                        <th>Tanggal Masuk</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>0098923783</td>
                        <td>12 Februari 2023</td>
                        <td><a href="/sales/oil/history/detail" class="btn merah text-putih">detail</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>0998889889</td>
                        <td>02 Juni 2023</td>
                        <td><a href="/sales/oil/history/detail" class="btn merah text-putih">detail</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>0098923783</td>
                        <td>12 Februari 2023</td>
                        <td><a href="/sales/oil/history/detail" class="btn merah text-putih">detail</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>0998889889</td>
                        <td>02 Juni 2023</td>
                        <td><a href="/sales/oil/history/detail" class="btn merah text-putih">detail</a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>0098923783</td>
                        <td>12 Februari 2023</td>
                        <td><a href="/sales/oil/history/detail" class="btn merah text-putih">detail</a></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>0998889889</td>
                        <td>02 Juni 2023</td>
                        <td><a href="/sales/oil/history/detail" class="btn merah text-putih">detail</a></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>0098923783</td>
                        <td>12 Februari 2023</td>
                        <td><a href="/sales/oil/history/detail" class="btn merah text-putih">detail</a></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>0998889889</td>
                        <td>02 Juni 2023</td>
                        <td><a href="/sales/oil/history/detail" class="btn merah text-putih">detail</a></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>0098923783</td>
                        <td>12 Februari 2023</td>
                        <td><a href="/sales/oil/history/detail" class="btn merah text-putih">detail</a></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>0998889889</td>
                        <td>02 Juni 2023</td>
                        <td><a href="/sales/oil/history/detail" class="btn merah text-putih">detail</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection