@extends('layouts.admin')
@section('title', 'Analytics')
@section('content-header', 'Analytics')
@section('content-action')
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Chart-js</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Charts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chart-js</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Doughnut Chart - User Types</h4>
                        <canvas id="doughnutChart" style="height:400px; width:100%;"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bar Chart - Registrations per Day (Last 7 Days)</h4>
                        <canvas id="barChart" style="height:400px; width:100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Include Chart.js from CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Doughnut Chart - User Types
        var ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');

        var userTypes = @json($userTypes);
        var labelsDoughnut = [];
        var dataDoughnut = [];

        userTypes.forEach(function(userType) {
            labelsDoughnut.push(userType.role);
            dataDoughnut.push(userType.count);
        });

        var doughnutChart = new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: labelsDoughnut,
                datasets: [{
                    label: 'User Types',
                    data: dataDoughnut,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
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

        // Bar Chart - Registrations per Day
        var ctxBar = document.getElementById('barChart').getContext('2d');

        var registrations = @json($registrations);
        var labelsBar = [];
        var dataBar = [];

        registrations.forEach(function(registration) {
            labelsBar.push(registration.date);
            dataBar.push(registration.count);
        });

        var barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: labelsBar,
                datasets: [{
                    label: 'Registrations per Day',
                    data: dataBar,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

    });
</script>
@endsection
