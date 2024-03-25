@extends('template.superadmin')
@section('contents')
     <div class="col-md-12">
        <div class="card rounded-4 p-4">
            <thead>
                <tr>
                    <h3 class="text-dark my-2 text-start" style="font-weight: bold;">List Account Warehouse</h3>
                </tr>
                <hr class="mt-1" style="background-color: black;">
            </thead>
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-start">
                        <div class="">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addwarehouse"><i class="fa-solid fa-plus"></i> Add Warehouse
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end">
                        <x-searchbar url="/{{ request()->path() }}" value="{{ request()->input('search') }}" />
                    </div>
                </div>
            </div>
             
            <table class="table-bordered mt-3 table" width="100%" cellspacing="">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Warehouse</th>
                        <th scope="col">No.HP</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Action</th>
                    </tr>

                </thead>
                <tbody class="text-center">
                     
                        <tr>
                            <td class="table-plus">no</td>
                            <td class="table-plus">nama</td>
                            <td class="table-plus">phone</td>
                            <td class="table-plus">nama</td>
                            </td>
                            <td><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#"><i
                                        class="fa-regular fa-file fa-lg"></i>
                                </button>
                            </td>
                        </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
            {{-- <ul class="pagination">
                <li class="page-item {{ $warehouse->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $warehouse->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item {{ $warehouse->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $warehouse->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul> --}}
        </div>
    </div>
@endsection
