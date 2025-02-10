@extends('layout.template')
@section('title', 'Home - Rent Car')

@section('content')
    @include('layout.card')
    <style>

body.popup-active {
    pointer-events: none; /* Menonaktifkan interaksi di seluruh halaman */
}

/* Hanya pop-up yang aktif dan dapat menerima interaksi */
body.popup-active .popup {
    pointer-events: all; /* Mengizinkan interaksi di dalam pop-up */
}
        /* Pop-up Modal Styles */
.popup {
    display: none; /* Hidden by default */
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.1);
    justify-content: center;
    align-items: center;
}

.popup-content {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    width: 300px;
    margin: auto;
}

.close-btn {
    float: right;
    font-size: 20px;
    cursor: pointer;
}

    </style>
<body>
    

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            
        </div>
    </div>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <h2>Selamat Datang</h2>
            <p>Apa yang akan Anda lakukan?</p>
            <a class="btn btn-primary" href="{{ route('sewa') }}">Sewa Mobil</a>
            <a class="btn btn-primary" href="{{ route('transaksiSelesai') }}">Lihat Transaksi</a>
        </div>
    </div>

<div class="col-sm-6 col-xl-11">
        <!--coba-->
        <livewire:sales-chart />
</div>
    


    <script>
// Show popup when the page loads
window.onload = function() {
    var popup = document.getElementById("popup");
    var closeBtn = document.getElementsByClassName("close-btn")[0];
    document.body.classList.add('popup-active');
    
    // Tampilkan pop-up
    popup.style.display = "flex";

    // Fungsi untuk menutup pop-up
    closeBtn.onclick = function() {
        popup.style.display = "none";
        document.body.classList.remove('popup-active');
    }

    // Close the popup when user clicks outside the popup content
    window.onclick = function(event) {
        if (event.target == popup) {
            popup.style.display = "none";
            document.body.classList.remove('popup-active');
        }
        
    }
    
}





    </script>
</body>
    
@endsection
