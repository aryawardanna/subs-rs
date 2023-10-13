@extends('layouts.dashboard')

@section('title')
    Store Dashboard
@endsection

@section('content')
<!-- Section Content -->
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
    <div class="dashboard-heading">
    <h2 class="dashboard-title">Dashboard</h2>
    <p class="dashboard-subtitle">
        Look what you have made today!
    </p>
    </div>
    <div class="dashboard-content">
    <div class="row">
        <div class="col-md-4">
        <div class="card mb-2">
            <div class="card-body">
            <div class="dashboard-card-title">
                Testing
            </div>
            <div class="dashboard-card-subtitle">
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card mb-2">
            <div class="card-body">
            <div class="dashboard-card-title">
                Price
            </div>
            <div class="dashboard-card-subtitle">
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card mb-2">
            <div class="card-body">
            <div class="dashboard-card-title">
                Type
            </div>
            <div class="dashboard-card-subtitle">
            </div>
            </div>
        </div>
        </div>
    </div>
        <div class="row mt-3">
            <div class="col-md-6 mt-2">
                <canvas id="chartTrash"></canvas>
            </div>
            <div class="col-md-6 mt-2">

            </div>

        </div>
    </div>
</div>
</div>
@endsection
@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <canvas id="myChart" width="400" height="400"></canvas>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'http://127.0.0.1:8000/trends', // Ganti URL sesuai dengan rute Anda.
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    // Data yang diterima dari controller.
                    createChart(data);
                },
                error: function(xhr, status, error) {
                    console.log('Terjadi kesalahan: ' + error);
                }
            });
        });

        function createChart(data) {
            var labels = [];
            var values = [];

            for (var i = 0; i < data.length; i++) {
                labels.push(data[i].name);
                values.push(data[i].jml);
            }

            var ctx = document.getElementById('chartTrash').getContext('2d');
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Grafik Tren Sampah',
                        data: values,
                        borderColor: 'blue',
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }




    </script>
@endpush
