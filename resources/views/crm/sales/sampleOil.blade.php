@extends('template.salesCrm')
@section('content')
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="text-center">
        <tr>
            <th scope="col">No SO</th>
            <th scope="col">Customer</th>
            <th scope="col">Project</th>
            <th scope="col">Sales Name</th>
            <th scope="col">Test Item</th>
            <th scope="col">Sample</th>
            <th scope="col">Progress</th>
            <th scope="col">Notes</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <tr>
            <td>A9099885</td>
            <td>Pertamina Indonesia</td>
            <td>Cilacap</td>
            <td>Nana</td>
            <td>
                <div>DGA</div>
                <div>Furan</div>
                <div>OA</div>
            </td>
            <td>
                <div>7</div>
                <div>7</div>
                <div>7</div>
            </td>
            <td>
                <div>In Progress</div>
                <div>In Progress</div>
                <div>In Progress</div>
            </td>
            <td><button href="#" class="btn" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa-regular fa-file fa-xl"></i></button></td>
        </tr>
        <tr>
            <td>A9099886</td>
            <td>PLN</td>
            <td>UP 3 Jakarta</td>
            <td>Rosyid</td>
            <td>
                <div>DGA</div>
                <div>Furan</div>
                <div>OA</div>
            </td>
            <td>
                <div>8</div>
                <div>8</div>
                <div>7</div>
            </td>
            <td>
                <div>Complete</div>
                <div>Complete</div>
                <div>Complete</div>
            </td>
            <td>
                <a href="/sample_Sales" class="btn" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa-regular fa-file fa-xl"></i></a>
            </td>
        </tr>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header merah">
                <h4 class="modal-title btn merah text-putih" id="exampleModalLabel" style="font-weight: bold;">Notes</h4>
                <button type="button" class="close putih" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">Sample Lengkap 7/7</form>
                <form action="">Sample Kurang Lengkap 6/7</form>
            </div>
            <div class="modal-footer">
                <a href="/sample_sales" type="button" class="btn merah text-putih" style="font-weight: bold;">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection