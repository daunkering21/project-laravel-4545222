@extends('dashboard.layouts.main')
@section('container')

{{-- <div class="container-fluid">
    <div class="pt-3 pb-2 mb-3 border-bottom text-center">
        <h3 class="h2">Halaman dashboard {{ auth()->user()->name }}</h3>
    </div>
    <div class="container-fluid">
        <div class="row border-0">
            <div class="col-12 py-5 rounded" style="background-color: rgb(176, 230, 84);">
                <div>
                    <p class="text-center">Loading <i class="bi bi-clock"></i></p>
                </div>
            </div>
            <div class="col-3 py-3 my-3 rounded" style="margin-right: 8px;background-color:brown;color:aliceblue">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, vel.
            </div>
            <div class="col-3 bg-success py-3 my-3 p-2 mx-2 rounded" style="color:aliceblue">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti corporis quam iste?
            </div>
            <div class="col-3 bg-dark py-3 my-3 p-2 mx-2 rounded" style="color:aliceblue">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam possimus quos aspernatur repudiandae earum error.
            </div>
        </div>
        
    </div>
</div> --}}
<section>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                <h3 id="clock">Loading...</h3>
                <p>Clock</p>
                </div>
                <div class="icon">
                <i class="ion ion-clock"></i>
                </div>
                <a href="https://dayspedia.com/time/online/" target="_blank" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                <h3>73<sup style="font-size: 20px">%</sup></h3>

                <p>Kesiapan Situs</p>
                </div>
                <div class="icon">
                <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $buaaa }}</h3>
                    <p>Jumlah Pengguna Terdaftar</p>
                </div>
                <div class="icon">
                <i class="ion ion-person-add"></i>
                </div>
                <a href="/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row border-top">
        <hr>
        <button id="copyButton" class="btn btn-primary py-3" onclick="copyAPI()">API userlist</button>
    </div>
</div>

{{-- <div class="row">
            <div class="col-3 text-lg-center align-content-center">
                <p class="p-3 fs-5 border bg-light">Total Postingan</p>
            </div>
            <div class="col-3 text-lg-center align-content-center">
                <p class="p-3 fs-5 border bg-light">{{ $hitung }}</p>
            </div>
            <div class="col">
            </div>
        </div> --}}
<script>
function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var timeString = hours.toString().padStart(2, '0') + ":" +
                        minutes.toString().padStart(2, '0') + ":" +
                        seconds.toString().padStart(2, '0');
    document.getElementById("clock").textContent = timeString;
    }
    setInterval(updateClock, 1000);

function copyAPI() {
    var apiURL = "http://127.0.0.1:8000/userlist";
    var tempInput = document.createElement("input");
    tempInput.value = apiURL;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999);
    document.execCommand("copy");
    document.body.removeChild(tempInput);
    alert("Link API berhasil disalin: " + apiURL);
}

    </script>
@endsection