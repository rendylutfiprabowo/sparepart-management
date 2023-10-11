@extends('template.adminoillab')
@section('content')

<div>
    <div>
        <h1 class="h3 mb-0 text-center" style="color: black;">Report Review</h1>
    </div>

    <div class="card border-danger w-50 mx-auto mt-4" style="border-width: 2px; border-style: solid;">
        <img id="gambarReport" src="Asset/gambar forrm report.png" class="card-img-top mt-2 img-fluid" alt="Gambar">
    </div>

    <div class="text-center mt-1">
        <span> Show : </span>
        <button type="button" class="btn text-abu" data-target="Asset/gambar form.png">DGA</button>
        <button type="button" class="btn text-abu" data-target="Asset/gambar forrm a.png">Furan</button>
        <button type="button" class="btn text-abu" data-target="Asset/gambar forrm report.png">OA</button>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="d-inline">
                    <a href="/report_adminlab" type="button" class="btn btn-danger text-white mx-4 my-2">Decline <i class="fa-solid fa-x ml-2"></i></a>
                    <a href="/report_adminlab" type="button" class="btn btn-success text-white my-2">Accept <i class="fa-solid fa-check ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const gambarReport = document.getElementById("gambarReport");
            const tombolDGA = document.querySelector('button[data-target="Asset/gambar form.png"]');
            const tombolFuran = document.querySelector('button[data-target="Asset/gambar forrm a.png"]');
            const tombolOA = document.querySelector('button[data-target="Asset/gambar forrm report.png"]');

            tombolDGA.addEventListener("click", function() {
                gambarReport.src = this.getAttribute("data-target");
                tombolDGA.classList.add("text-danger");
                tombolFuran.classList.remove("text-danger");
                tombolOA.classList.remove("text-danger");
            });

            tombolFuran.addEventListener("click", function() {
                gambarReport.src = this.getAttribute("data-target");
                tombolDGA.classList.remove("text-danger");
                tombolFuran.classList.add("text-danger");
                tombolOA.classList.remove("text-danger");
            });

            tombolOA.addEventListener("click", function() {
                gambarReport.src = this.getAttribute("data-target");
                tombolDGA.classList.remove("text-danger");
                tombolFuran.classList.remove("text-danger");
                tombolOA.classList.add("text-danger");
            });
        });
    </script>
</div>

@endsection