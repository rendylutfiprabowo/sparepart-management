@extends('template.salesoil')
@section('content')
<table class="table table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="text-center">
        <tr>
            <th scope="col">No SO</th>
            <th scope="col">Customer</th>
            <th scope="col">Project</th>
            <th scope="col">Test Item</th>
            <th scope="col">Progress</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <tr>
            <td>A9099885</td>
            <td>Pertamina Indonesia</td>
            <td>Cilacap</td>
            <td>
                <div>DGA</div>
                <div>Furan</div>
                <div>OA</div>
            </td>
            <td>
                <div>Complete</div>
                <div>Complete</div>
                <div>Complete</div>
            </td>
            <td><button type="button" class="btn merah text-putih">download</button></td>
        <tr>
            <td>A9099885</td>
            <td>Pertamina Indonesia</td>
            <td>Balikpapan</td>
            <td>
                <div>DGA</div>
                <div>OA</div>
            </td>
            <td>
                <div>Complete</div>
                <div>Complete</div>
            </td>
            <td><button type="button" class="btn merah text-putih">download</button></td>
        </tr>
        <tr>
            <td>A9099885</td>
            <td>Pertamina Indonesia</td>
            <td>Balangon</td>
            <td>
                <div>DGA</div>
                <div>Furan</div>
                <div>OA</div>
            </td>
            <td>
                <div>Complete</div>
                <div>Complete</div>
                <div>Complete</div>
            </td>
            <td><button type="button" class="btn merah text-putih">download</button></td>
        </tr>
        <tr>
            <td>A9099885</td>
            <td>Pertamina Indonesia</td>
            <td>Lampung</td>
            <td>
                <div>DGA</div>
                <div>Furan</div>
            </td>
            <td>
                <div>Complete</div>
                <div>In Progress</div>
            </td>
            <td><button type="button" class="btn merah text-putih">download</button></td>
        </tr>
    </tbody>
</table>
@endsection