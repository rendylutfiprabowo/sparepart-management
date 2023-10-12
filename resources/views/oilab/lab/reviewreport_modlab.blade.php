@extends('template.modoillab')
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
                    <button type="button" class="btn btn-danger text-white mx-4 my-2" id="showModalBtn">Decline <i class="fa-solid fa-x ml-2"></i></button>
                    <a href="/report_modlab" type="button" class="btn btn-success text-white my-2">Accept <i class="fa-solid fa-check ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- modal yes no -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header merah">
                    <h5 class="modal-title text-putih" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to decline this report?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-white" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-success text-white" id="yesButton">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalKedua" tabindex="-1" aria-labelledby="modalKeduaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header merah">
                    <h5 class="modal-title text-putih" id="modalKeduaLabel">Input Notes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="/report_modlab" type="button" class="btn merah text-putih">Save changes</a>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- js yes no  -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const showModalButton = document.getElementById("showModalBtn");
        const yesButton = document.getElementById("yesButton");
        const declineButton = document.getElementById("declineButton"); // Tambahkan ID "declineButton" pada tombol "Decline"

        showModalButton.addEventListener("click", function() {
            $('#exampleModal').modal('show');
        });

        yesButton.addEventListener("click", function() {
            $('#exampleModal').modal('hide');
            $('#modalKedua').modal('show');

            // Animasi scroll ke atas
            $('html, body').animate({
                scrollTop: 0
            }, 'fast');
        });

        // Tambahkan event listener untuk tombol "Decline"
        showModalBtn.addEventListener("click", function() {
            // Animasi scroll ke atas saat tombol "Decline" ditekan
            $('html, body').animate({
                scrollTop: 0
            }, 'fast');
        });
    });
</script>



<!-- script button dga furan oa -->
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